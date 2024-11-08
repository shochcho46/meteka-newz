    <meta charset="UTF-8">
    <meta name='keywords' content="{{ $seoData->keyword ?: 'Amader Protidin,Rangpur, bangla news, current News, bangla newspaper, bangladesh newspaper, online paper, bangladeshi newspaper, bangla news paper, bangladesh newspapers, newspaper, all bangla news paper, bd news paper, news paper, bangladesh news paper, daily, bangla newspaper, daily news paper, bangladeshi news paper, bangla paper, all bangla newspaper, bangladesh news, daily newspaper,popular, bangla newspaper, daily news paper, breaking news, current news, online bangla newspaper, online paper, all bangla news paper, bd news, bangladeshi potrika, bangladeshi news portal, all bangla newspaper, bangla news, bd newspaper, bangla news 24, live sports, polities, entertainment, lifestyle, country news,আমাদের প্রতিদিন ,রংপুর ,অনলাইন, পত্রিকা, বাংলাদেশ, আজকের পত্রিকা, আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, নকশা, রস+আলো, ছুটির দিনে, অধুনা, স্বপ্ন নিয়ে, আনন্দ, অন্য আলো, সাহিত্য, গোল্লাছুট, প্রজন্ম ডট কম, বন্ধুসভা,কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, দুর্নীতি, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর' }}">
    <meta name='language' content='EN'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name='author' content='SparkTech, email@hotmail.com'>
    <meta name='owner' content=''>
    <meta name='distribution' content='Global'>
    @if (empty($data->head))
    <link rel="canonical" href="{{ url(''); }}" />
    @endif
    <meta name='subtitle' content="{{ $seoData->title ?: 'আমাদের প্রতিদিন | বাংলা নিউজ পেপার | বাংলা খবরের কাগজ'}}">
    <meta name='target' content='all'>
    <meta http-equiv="refresh" content="{{ $seoData->refresh ?: '60'}}">

    @if (!empty($data->head))
    <title>{{ $data->head ?: 'আমাদের প্রতিদিন | বাংলা নিউজ পেপার | বাংলা খবরের কাগজ'}}</title>
    <meta name='description' content="{{  strip_tags(Str::limit($data->detail, 500, $end='.......')) ?: ' Amader Protidin is the Most Popular Bangla Newspaper in Bangladesh. It covers Breaking News, Politics, Economies, National, International, Live Sports, Entertainment, Lifestyle, Tech, Education, Photo, Video, BD News & More. Stay with us for get more Latest News.বাংলাদেশ রংপুর  সহ বিশ্বের সর্বশেষ সংবাদ শিরোনাম, প্রতিবেদন, বিশ্লেষণ, খেলা, বিনোদন, চাকরি, রাজনীতি ও বাণিজ্যের বাংলা নিউজ পড়তে ভিজিট করুন।' }}">
    @else
    <title>{{ $seoData->title ?: 'আমাদের প্রতিদিন | বাংলা নিউজ পেপার | বাংলা খবরের কাগজ'}}</title>
    <meta name='description' content="{{  $seoData->description ?: ' Amader Protidin is the Most Popular Bangla Newspaper in Bangladesh. It covers Breaking News, Politics, Economies, National, International, Live Sports, Entertainment, Lifestyle, Tech, Education, Photo, Video, BD News & More. Stay with us for get more Latest News.বাংলাদেশ রংপুর  সহ বিশ্বের সর্বশেষ সংবাদ শিরোনাম, প্রতিবেদন, বিশ্লেষণ, খেলা, বিনোদন, চাকরি, রাজনীতি ও বাণিজ্যের বাংলা নিউজ পড়তে ভিজিট করুন।' }}">
    @endif
    <meta name="google-site-verification" content="{{ $seoData->gverify ?: 'yhoPbUhZ95cOAcRm4kdjobFLACELfg59gmNt8_r-0Os'}}" />