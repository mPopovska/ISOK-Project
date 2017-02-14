@extends('layout.catalog')

@section('breadcrumbs')
    <ol class = "breadcrumb">
        <li><a href = "http://localhost:8000/">Почетна</a></li>
        <li class="active"><a href = "http://localhost:8000/tablets">Таблети</a></li>
    </ol>
@endsection

@section('filter')
    <form action="/tablets" method="get">
        <div class="panel panel-info">
            <div class="panel-heading">Производител</div>
            <div class="panel-body">
                <div class="checkbox"><label><input type="checkbox" value="sony" name="tablet_check_list[]">Sony Mobile</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="apple" name="tablet_check_list[]">Apple</label><br></div>
                <div class="checkbox"><label><input type="checkbox" value="samsung" name="tablet_check_list[]">Samsung</label><br></div>
            </div>

            <div class="panel-heading">Тарифа</div>
            <div class="panel-body">
                <div class="radio"><label><input type="radio" value="smart_s" name="tarifa">Smart S</label><br></div>
                <div class="radio"><label><input type="radio" value="smart_m" name="tarifa">Smart M</label><br></div>
                <div class="radio"><label><input type="radio" value="smart_l" name="tarifa">Smart L</label><br></div>
                <div class="radio"><label><input type="radio" value="magenta_s" name="tarifa">Magenta S</label><br></div>
                <div class="radio"><label><input type="radio" value="magenta_m" name="tarifa">Magenta M</label><br></div>
                <div class="radio"><label><input type="radio" value="magenta_l" name="tarifa">Magenta L</label><br></div>
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
    if(!empty($tablets)){
        if(empty($tarifa)){
            foreach ($tablets as $tablet){
                echo "
                            <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$tablet->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' data-toggle='modal' data-target='#$tablet->id' src=\"$tablet->img\" style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$tablet->magenta_m ден</h3><br><p style='text-align: center'>Цена за Magenta M</p><br>
                                            <form action='/tablet_details' method='get'>
                                                <input type='number' name='tablet_id' value='$tablet->id' hidden>
                                                <input type='text' name='model' value='$tablet->name' hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"modal fade\" id=\"$tablet->id\" role=\"dialog\">
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">$tablet->name</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <div class='row'>
                                                <div class='col-sm-6'><img width='160' height='212' src=\"$tablet->img\" style=\"display: block; margin-left: auto; margin-right: auto\"></div>
                                                <div class='col-sm-6'>
                                                    <p class='center'>Екран: $tablet->screen</p>
                                                    <p class='center'>Примарна камера: $tablet->primary_camera</p>
                                                    <p class='center'>Секундарна камера: $tablet->secondary_camera</p>
                                                    <p class='center'>ОС: $tablet->os</p>
                                                    <p class='center'>РАМ: $tablet->ram</p>
                                                    <p class='center'>Меморија: $tablet->rom</p>
                                                    <p class='center'>Процесор: $tablet->cpu</p>
                                                    <p class='center'>ГПС: $tablet->gps</p>
                                                    <p class='center'>Блутут: $tablet->bluetooth</p>
                                                    <p class='center'>Wi-Fi: $tablet->wifi</p>
                                                    <p class='center'>Батерија: $tablet->battery</p>
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
            foreach ($tablets as $tablet){
                $tarOpis="";

                if($tarifa == 'smart_s'){
                    $price=$tablet->smart_s;
                    $tarOpis="Цена за Smart S";
                }
                else if($tarifa == 'smart_m'){
                    $price=$tablet->smart_m;
                    $tarOpis="Цена за Smart M";
                }
                else if($tarifa == 'smart_l'){
                    $price=$tablet->smart_l;
                    $tarOpis="Цена за Smart L";
                }
                else if($tarifa == 'magenta_s'){
                    $price=$tablet->magenta_s;
                    $tarOpis="Цена за Magenta S";
                }
                else if($tarifa == 'magenta_m'){
                    $price=$tablet->magenta_m;
                    $tarOpis="Цена за Magenta M";
                }
                else if($tarifa == 'magenta_l'){
                    $price=$tablet->magenta_l;
                    $tarOpis="Цена за Magenta L";
                }

                echo "
                            <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$tablet->name</p></div>
                                        <div class='panel-body' ><img width='160' height='212' data-toggle='modal' data-target='#$tablet->id' src=\"$tablet->img\" style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$price ден</h3><br><p style='text-align: center'>$tarOpis</p><br>
                                            <form action='/tablet_details' method='get'>
                                                <input type='number' name='tablet_id' value='$tablet->id' hidden>
                                                <input type='text' name='model' value='$tablet->name' hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"modal fade\" id=\"$tablet->id\" role=\"dialog\">
                                <div class=\"modal-dialog\">

                                    <!-- Modal content-->
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                            <h4 class=\"modal-title\">$tablet->name</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <div class='row'>
                                                <div class='col-sm-6'><img width='160' height='212' src=\"$tablet->img\" style=\"display: block; margin-left: auto; margin-right: auto\"></div>
                                                <div class='col-sm-6'>
                                                    <p class='center'>Екран: $tablet->screen</p>
                                                    <p class='center'>Примарна камера: $tablet->primary_camera</p>
                                                    <p class='center'>Секундарна камера: $tablet->secondary_camera</p>
                                                    <p class='center'>ОС: $tablet->os</p>
                                                    <p class='center'>РАМ: $tablet->ram</p>
                                                    <p class='center'>Меморија: $tablet->rom</p>
                                                    <p class='center'>Процесор: $tablet->cpu</p>
                                                    <p class='center'>ГПС: $tablet->gps</p>
                                                    <p class='center'>Блутут: $tablet->bluetooth</p>
                                                    <p class='center'>Wi-Fi: $tablet->wifi</p>
                                                    <p class='center'>Батерија: $tablet->battery</p>
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
        }

    }else{
        echo "  <div class='col-sm-12'>
                        <p style='text-align: center'>Не се пронајдени податоци!</p>
                    </div>";
    }
    ?>
@endsection