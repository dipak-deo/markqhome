<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}
    <title>download form data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Name : {{ $data->name }}</h5>
                        <p>email: {{ $data->email }}</p>
                        <p>phone: {{ $data->email }}</p>
                        <p>song name nepali: {{ $data->song_name_nepali }}</p>
                        <p>song name english: {{ $data->song_name_english }}</p>
                        <p>youtube channel: {{ $data->youtube_channel }} </p>
                        <?php
                        $award_cat = [];
                        foreach(json_decode($data->award_category_id) as $items){
                            $award_cat[] = award_category_detail($items)->name ?? 'N/A';
                        }
                        ?>
                        <p>Award category: {{ implode(', ',$award_cat) }}</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>