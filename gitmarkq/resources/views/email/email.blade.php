<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['subject'] }}</title>
</head>

<body>
    <?php
        $data['payload'] = str_replace('$site_title', $settings->site_title, $data['payload']);
        $data['payload'] = str_replace('$site_address', $settings->address, $data['payload']);
        $data['payload'] = str_replace('$site_phone', $settings->phone, $data['payload']);
        // $data['payload'] = str_replace('$name', $data['name'], $data['payload']);

        foreach($data as $key => $val){
                // $value['payload'] = str_replace('{'.$key.'}',$val,$value['payload']);
                $replace = '$'.$key;
                $data['payload'] = str_replace($replace, $val, $data['payload']);
            }
    ?>
   {!! $data['payload'] !!}

</body>

</html>
