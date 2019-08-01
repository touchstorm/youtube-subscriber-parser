# YouTube Subscriber Count Parser [![Build Status](https://travis-ci.org/touchstorm/youtube-subscriber-parser.svg?branch=master)](https://travis-ci.org/touchstorm/youtube-subscriber-parser)
### Parsing YouTube subscriber counts into usable integers. 
In May of 2019 **[YouTube announced](https://support.google.com/youtube/thread/6543166)** an update that would affect subscriber counts on their YouTube Data API.
This update would adjust the full integer formatting of subscriber counts **(673335)**, found in the API responses, to match the abbreviated display format **(673K)** found on YouTubes video & channel pages.

This library will convert YouTube's formatted strings to integers for easy database storage, front end display, etc.

**YouTube Data API Request**
```
GET /v3/channels?part=statistics&forUsername=howdiniguru&key=...&fields=items(statistics(subscriberCount))
```

**Pre August 2019 response**
```json
{
 "items": [
  {
   "statistics": {
    "subscriberCount": "673335"
   }
  }
 ]
}
```

**Post August 2019 response**
```json
{
 "items": [
  {
   "statistics": {
    "subscriberCount": "673K"
   }
  }
 ]
}
```

## Installation & Usage

```
composer require touchstorm/youtube-subscriber-parser
```

```php
require_once __DIR__ . '/../vendor/autoload.php';

use Subscriber\Count;

$tens_abbr_count = '41';
$hundreds_abbr_count = '311';
$thousands_decimal_abbr_count = '1.5K';
$thousands_abbr_count = '883K';
$millions_abbr_count = '99M';
$hundred_millions_abbr_count = '943M';

echo Count::parse($tens_abbr_count); // 41
echo Count::parse($hundreds_abbr_count); // 311
echo Count::parse($thousands_decimal_abbr_count); // 1500
echo Count::parse($thousands_abbr_count); // 883000
echo Count::parse($millions_abbr_count); // 99000000
echo Count::parse($hundred_millions_abbr_count); // 943000000

```