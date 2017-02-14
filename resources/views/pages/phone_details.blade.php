@extends('layout.details')

@section('breadcrumbs')
    <ol class = "breadcrumb">
        <li><a href = "http://localhost:8000/">Почетна</a></li>
        <li><a href = "http://localhost:8000/phones">Мобилни</a></li>
    </ol>
@endsection

@section('phone_info')
    <?php
        if(!empty($phone)){
            echo "        <div class='col-sm-12'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$phone->name</p></div>
                                        <div class='panel-body'><img src=\"$phone->img\" style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <p class='center'>Екран: $phone->screen</p>
                                            <p class='center'>Примарна камера: $phone->primary_camera</p>
                                            <p class='center'>Секундарна камера: $phone->secondary_camera</p>
                                            <p class='center'>ОС: $phone->os</p>
                                            <p class='center'>РАМ: $phone->ram</p>
                                            <p class='center'>Меморија: $phone->rom</p>
                                            <p class='center'>Процесор: $phone->cpu</p>
                                            <p class='center'>ГПС: $phone->gps</p>
                                            <p class='center'>Блутут: $phone->bluetooth</p>
                                            <p class='center'>Wi-Fi: $phone->wifi</p>
                                            <p class='center'>Батерија: $phone->battery</p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
    ?>
@endsection

@section('main_content')
    <?php
    if(!empty($phone)){
        echo "
                    <div class='col-sm-4'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Magenta S</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->magenta_s ден.</p>
                                <p>Месечна претплата: 599 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : 100</p>
                                <p>Интернет : 500 MB</p>
                          </div>
                        </div>
                    </div>

                    <div class='col-sm-4'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Magenta M</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->magenta_m ден.</p>
                                <p>Месечна претплата: 899 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Интернет : 8 GB</p>
                          </div>
                        </div>
                    </div>

                    <div class='col-sm-4'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Magenta L</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->magenta_l ден.</p>
                                <p>Месечна претплата: 1499 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Интернет : 12 GB</p>
                          </div>
                        </div>
                    </div>


                    <div class='col-sm-4' style='margin-top: 20px'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Smart S</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->smart_s ден.</p>
                                <p>Месечна претплата: 599 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : 100</p>
                                <p>Интернет : 500 MB</p>
                          </div>
                        </div>
                    </div>

                    <div class='col-sm-4' style='margin-top: 20px'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Smart M</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->smart_m ден.</p>
                                <p>Месечна претплата: 899 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Интернет : 8 GB</p>
                          </div>
                        </div>
                    </div>

                    <div class='col-sm-4' style='margin-top: 20px'>
                        <div class='panel panel-info'>
                          <div class='panel-heading'>Smart L</div>
                          <div class='panel-body'>
                                <p>Цена на уред : $phone->smart_l ден.</p>
                                <p>Месечна претплата: 1499 ден.</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Минути кон нашата мрежа : неограничено</p>
                                <p>Интернет : 12 GB</p>
                          </div>
                        </div>
                    </div>
               ";
    }
    ?>
@endsection

@section('phone_reviews')
    <?php
        if(!empty($reviews)){
            foreach ($reviews as $review){
                echo "<div class='panel panel-info'>
                        <div class='panel-heading'>Објавено од :   $review->nickname</div>
                        <div class='panel-body'>$review->comment</div>
                      </div>";
            }
        }
    ?>
@endsection

@section('write_phone_review')
    <form action="/submit_phone_comment" method="post">
        <input type="text" name="nickname" class="form-control" placeholder="Внесете прекар" required>
        <textarea name="comment" class="form-control" placeholder="Внесете го вашиот коментар тука" required style="margin-top: 10px;"></textarea>
        <input type="text" name="phone_model" value="<?php echo "{$_GET['model']}" ?>" hidden>
        <input type="number" name="phone_id" value="<?php echo "{$_GET['phone_id']}" ?>" hidden>
        <input type="submit" name="submit" class="btn btn-success" value="Коментирај" style="margin-top: 10px;">
    </form>
@endsection
