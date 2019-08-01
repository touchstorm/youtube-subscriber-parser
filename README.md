# Youtube Subscriber Parser
### Parsing YouTube subscriber counts into usable integers. 
In May of 2019 **[YouTube announced](https://support.google.com/youtube/thread/6543166)** an update that would affect subscriber counts on their YouTube Data API.
This update would adjust the full integer formatting of subscriber counts **(673335)**, found in the API responses, to match the abbreviated display format **(673K)** found on YouTubes video pages.

**YouTube Data API Request**
```json
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