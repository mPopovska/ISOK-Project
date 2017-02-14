@extends('layout.details')

@section('breadcrumbs')
    <ol class = "breadcrumb">
        <li><a href = "http://localhost:8000/">Почетна</a></li>
        <li><a href = "http://localhost:8000/laptops">Лаптопи</a></li>
    </ol>
@endsection

@section('phone_info')
    <?php
    if(!empty($laptop)){
        echo "        <div class='col-sm-12'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$laptop->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' src=\"$laptop->img\" style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <p class='center'>Екран: $laptop->monitor $laptop->screen_size</p>
                                            <p class='center'>РАМ: $laptop->memory</p>
                                            <p class='center'>Хард диск: $laptop->hard_disk</p>
                                            <p class='center'>Процесор: $laptop->processor</p>
                                            <p class='center'>Графичка: $laptop->graphics</p>
                                            <p class='center'>Батерија: $laptop->battery</p>
                                            <p class='center'>Гаранција: $laptop->warranty години</p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
    }
    ?>
@endsection

@section('main_content')

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
    <form action="/submit_laptop_comment" method="post">
        <input type="text" name="nickname" class="form-control" placeholder="Внесете прекар" required>
        <textarea name="comment" class="form-control" placeholder="Внесете го вашиот коментар тука" required style="margin-top: 10px;"></textarea>
        <input type="number" name="laptop_id" value="<?php echo "{$_GET['laptop_id']}" ?>" hidden>
        <input type="text" name="laptop_model" value="<?php echo "{$_GET['model']}" ?>" hidden>
        <input type="submit" name="submit" class="btn btn-success" value="Коментирај" style="margin-top: 10px;">
    </form>
@endsection