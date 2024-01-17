<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait MultiFilesUpload
{
    public function handleMultiUpload(Request $request, string $fieldName, ?array $oldPaths = null, string $dir = 'uploads/user_images'): ?array
    {
        /** Check request has files */
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $uploadedFiles = [];

        /** Delete the existing images if have */
        if ($oldPaths) {
            foreach ($oldPaths as $oldPath) {
                if (File::exists(public_path($oldPath))) {
                    File::delete(public_path($oldPath));
                }
            }
        }

        $files = $request->file($fieldName);

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $updatedFileName = \Str::random(30) . '.' . $extension;

            $file->move(public_path($dir), $updatedFileName);

            $filePath = $dir . '/' . $updatedFileName;
            $uploadedFiles[] = $filePath;
        }

        return $uploadedFiles;
    }

    /** Handle file delete */
    public function deleteFile(string $path): void
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
