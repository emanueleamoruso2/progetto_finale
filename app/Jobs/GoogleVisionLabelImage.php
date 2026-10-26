<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Image as VisionImage;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Queueable;

    private $announce_image_id;

    public function __construct($announce_image_id)
    {
        $this->announce_image_id = $announce_image_id;
    }

    public function handle(): void
    {
        $i = Image::find($this->announce_image_id);

        if (!$i) {
            return;
        }

        $image = file_get_contents(
            storage_path('app/public/' . $i->path)
        );

        putenv(
            'GOOGLE_APPLICATION_CREDENTIALS=' .
            base_path('google_credential.json')
        );

        $imageAnnotator = new ImageAnnotatorClient();

        $google_image = new VisionImage([
            'content' => $image
        ]);

        $googleFeature = new Feature();

        $googleFeature->setType(
            Type::LABEL_DETECTION
        );

        $request = new AnnotateImageRequest();

        $request->setImage($google_image);

        $request->setFeatures([
            $googleFeature
        ]);

        $batchRequest = new BatchAnnotateImagesRequest();

        $batchRequest->setRequests([
            $request
        ]);

        $responseBatch = $imageAnnotator
            ->batchAnnotateImages($batchRequest);

        $response = $responseBatch
            ->getResponses()[0];

        $labels = $response->getLabelAnnotations();

        if ($labels) {

            $result = [];

            foreach ($labels as $label) {
                $result[] = $label->getDescription();
            }

            $i->labels = $result;

            $i->save();
        }

        $imageAnnotator->close();
    }
}