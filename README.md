## About

This project is a demo for testing the connection with an S3 compatible bucket. It uploads a file to the "files" folder, lists all the files in that folder (directly from the bucket, no DB), and generates a signed url to see the files.

## Dependencies

All PHP dependencies were installed via composer and should be listed in `composer.json`. The dependencies were installed with:

```
composer create-project laravel/laravel example-app
composer require --with-all-dependencies league/flysystem-aws-s3-v3 "^3.0"
```

Other low level dependencies can be found in the `Dockerfile`.

## Relevant Files

There are only two functionalities, `upload` and `list-files`, all relevant files are:
- app/Http/Controllers/FileUploadController.php
- resources/views/File/list.blade.php
- resources/views/File/upload.blade.php
- routes/web.php
- Dockerfile
- docker-compose.yml