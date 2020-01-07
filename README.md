## About TUS
This is the Canarie fork of the TUS module, which works with external file systems.
This is a Drupal 8 integration for [tus-php](https://github.com/ankitpokhrel/tus-php).

###How to install:
1. Download & enable this module.
2. Install vendor package with `composer require ankitpokhrel/tus-php`
2. Ensure these headers in your CORS services.yml settings:
'upload-checksum', 'upload-concat', 'upload-key', 'upload-length', 
'upload-metadata', 'upload-offset', 'location', 
'tus-checksum-algorithm', 
'tus-extension', 'tus-max-size', 'tus-resumable', 'tus-version'
3. If you are using a custom TUS upload client, ensure it 
passes these values in the header Upload-Metadata (example values given):
entityType: 'node',
entityBundle: 'article',
fieldName: 'field_image'

