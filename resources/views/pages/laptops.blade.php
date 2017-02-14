@extends('layout.catalog')
@section('breadcrumbs')
    <ol class = "breadcrumb">
        <li><a href = "http://localhost:8000/">Почетна</a></li>
        <li class="active"><a href = "http://localhost:8000/tablets">Таблети</a></li>
    </ol>
@endsection

@section('filter')
    <form action="/laptops" method="get">
        <div class="panel panel-info">
            <div class="panel-heading">Производител</div>
            <div class="panel-body">
                <div class="checkbox"><label><input type="checkbox" value="asus" name="laptop_check_list[]">Asus</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="dell" name="laptop_check_list[]">Dell</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="apple" name="laptop_check_list[]">Apple</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="lenovo" name="laptop_check_list[]">Lenovo</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="acer" name="laptop_check_list[]">Acer</label><br></div>
            </div>

            <div class="panel-heading">Сортирај</div>
            <div class="panel-body">
                <div class="radio"><label><input type="radio" value="ascending" name="sort">По цена, од најмала</label><br></div>
                <div class="radio"><label><input type="radio" value="descending" name="sort">По цена, од најголема</label><br></div>
            </div>

            <input class="btn btn-success btn-block" type="submit" value="Пребарај">
        </div>
    </form>
@endsection

@section('main_content')
    <?php
        if(!empty($laptops)){
            foreach ($laptops as $laptop){
                echo "
                            <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$laptop->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' src=\"$laptop->img\" data-toggle='modal' data-target='#$laptop->id' style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$laptop->price ден</h3><br><p style='text-align: center'>Цена на уредот</p><br>
                                            <form action='/laptop_details' method='get'>
                                                <input type='number' name='laptop_id' value=$laptop->id hidden>
                                                <input type='text' name='model' value=$laptop->name hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class=\"modal fade\" id=\"$laptop->id\" role=\"dialog\">
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">$laptop->name</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <div class='row'>
                                                <div class='col-sm-6'><img width='160' height='212' src=\"$laptop->img\" style=\"display: block; margin-left: auto; margin-right: auto\"></div>
                                                <div class='col-sm-6'>
                                                    <p class='center'>Екран: $laptop->monitor</p>
                                                    <p class='center'>РАМ: $laptop->memory</p>
                                                    <p class='center'>Хард диск: $laptop->hard_disk</p>
                                                    <p class='center'>Процесор: $laptop->processor</p>
                                                    <p class='center'>Графичка: $laptop->graphics</p>
                                                    <p class='center'>Батерија: $laptop->battery</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Затвори</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        ";
            }
        }else{
            echo "<div class='col-sm-12'><h4 style='text-align: center'>Во моментов немаме производи од оваа категорија.</h4></div>";
        }
    ?>
@endsection