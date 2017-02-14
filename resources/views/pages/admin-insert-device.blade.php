@extends('layout.admin-layout')

@section('insert-device')
    <div class="panel-group" id="accordion">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Внесете Мобилен уред</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <form action="/admin/add-phone" method="post">

                        <div class="form-group">
                            <label for="img">Слика:</label><input type="text" name="img" id="img" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="screen">Екран:</label><input type="text" name="screen" id="screen" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="primary_camera">Задна камера:</label><input type="text" name="primary_camera" id="primary_camera" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="secondary_camera">Предна камера:</label><input type="text" name="secondary_camera" id="secondary_camera" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="os">Оперативен систем:</label><input type="text" name="os" id="os" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="ram">РАМ:</label><input type="text" name="ram" id="ram" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="os">РОМ:</label><input type="text" name="rom" id="rom" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cpu">Процесор:</label><input type="text" name="cpu" id="cpu" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 30px; display: inline-block">ГПС: </label>
                            <label  class="radio-inline"><input type="radio" name="gps" value="1" checked>ДА</label>
                            <label  class="radio-inline"><input type="radio" name="gps" value="0">НЕ</label>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 30px; display: inline-block">WiFi: </label>
                            <label class="radio-inline"><input type="radio" name="wifi" value="1" checked>ДА</label>
                            <label class="radio-inline"><input type="radio" name="wifi" value="0">НЕ</label>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 30px; display: inline-block">Блутут: </label>
                            <label class="radio-inline"><input type="radio" name="bluetooth" value="1" checked>ДА</label>
                            <label class="radio-inline"><input type="radio" name="bluetooth" value="0">НЕ</label>
                        </div>

                        <div class="form-group">
                            <label for="battey">Батерија:</label><input type="text" name="battery" id="battery" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="battey">Тежина:</label><input type="text" name="weight" id="weight" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="battey">Модел:</label><input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="code_name">Кодно име:</label>
                            <select class="form-control" name="code_name" id="code_name">
                                <option value="sony">Sony</option>
                                <option value="huawei">Huawei</option>
                                <option value="apple">Apple</option>
                                <option value="samsung">Samsung</option>
                                <option value="htc">HTC</option>
                                <option value="lg">LG</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="just_device">Цена за уред без договор:</label><input type="text" name="just_device" id="just_device" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="smart_s">Цена во Smart S:</label><input type="text" name="smart_s" id="smart_s" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="smart_m">Цена во Smart M:</label><input type="text" name="smart_m" id="smart_m" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="smart_l">Цена во Smart L:</label><input type="text" name="smart_l" id="smart_l" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="magenta_s">Цена во Magenta S:</label><input type="text" name="magenta_s" id="magenta_s" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="magenta_m">Цена во Magenta M:</label><input type="text" name="magenta_m" id="magenta_m" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="magenta_l">Цена во Magenta L:</label><input type="text" name="magenta_l" id="magenta_l" class="form-control" required>
                        </div>

                        <input type="submit" value="Внеси" class="btn btn-success">
                    </form>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Внесете таблет</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="/admin/add-tablet" method="post">

                            <div class="form-group">
                                <label for="tabimg">Слика:</label><input type="text" name="tabimg" id="tabimg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabscreen">Екран:</label><input type="text" name="tabscreen" id="tabscreen" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabprimary_camera">Задна камера:</label><input type="text" name="tabprimary_camera" id="tabprimary_camera" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabsecondary_camera">Предна камера:</label><input type="text" name="tabsecondary_camera" id="tabsecondary_camera" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabos">Оперативен систем:</label><input type="text" name="tabos" id="tabos" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabram">РАМ:</label><input type="text" name="tabram" id="tabram" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabrom">РОМ:</label><input type="text" name="tabrom" id="tabrom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabcpu">Процесор:</label><input type="text" name="tabcpu" id="tabcpu" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">ГПС: </label>
                                <label  class="radio-inline"><input type="radio" name="tabgps" value="1" checked>ДА</label>
                                <label  class="radio-inline"><input type="radio" name="tabgps" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">WiFi: </label>
                                <label class="radio-inline"><input type="radio" name="tabwifi" value="1" checked>ДА</label>
                                <label class="radio-inline"><input type="radio" name="tabwifi" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">Блутут: </label>
                                <label class="radio-inline"><input type="radio" name="tabbluetooth" value="1" checked>ДА</label>
                                <label class="radio-inline"><input type="radio" name="tabbluetooth" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label for="tabbattery">Батерија:</label><input type="text" name="tabbattery" id="tabbattery" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabweight">Тежина:</label><input type="text" name="tabweight" id="tabweight" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabname">Модел:</label><input type="text" name="tabname" id="tabname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabcode_name">Кодно име:</label>
                                <select class="form-control" name="tabcode_name" id="tabcode_name">
                                    <option value="sony">Sony</option>
                                    <option value="apple">Apple</option>
                                    <option value="samsung">Samsung</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tabjust_device">Цена за уред без договор:</label><input type="text" name="tabjust_device" id="tabjust_device" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabsmart_s">Цена во Smart S:</label><input type="text" name="tabsmart_s" id="tabsmart_s" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabsmart_m">Цена во Smart M:</label><input type="text" name="tabsmart_m" id="tabsmart_m" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabsmart_l">Цена во Smart L:</label><input type="text" name="tabsmart_l" id="tabsmart_l" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabmagenta_s">Цена во Magenta S:</label><input type="text" name="tabmagenta_s" id="tabmagenta_s" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabmagenta_m">Цена во Magenta M:</label><input type="text" name="tabmagenta_m" id="tabmagenta_m" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tabmagenta_l">Цена во Magenta L:</label><input type="text" name="tabmagenta_l" id="tabmagenta_l" class="form-control" required>
                            </div>

                            <input type="submit" value="Внеси" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Внесете лаптоп</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="/admin/add-laptop" method="post">
                            <div class="form-group">
                                <label for="laptopimg">Слика:</label><input type="text" name="laptopimg" id="laptopimg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopname">Производител:</label><input type="text" name="laptopname" id="laptopname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopcpu">Процесор:</label><input type="text" name="laptopcpu" id="laptopcpu" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopram">РАМ меморија:</label><input type="text" name="laptopram" id="laptopram" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptophdd">Хард диск:</label><input type="text" name="laptophdd" id="laptophdd" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopmonitor">Дисплеј:</label><input type="text" name="laptopmonitor" id="laptopmonitor" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopscreensize">Големина на екран:</label><input type="text" name="laptopscreensize" id="laptopscreensize" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopdvd">ДВД-РОМ:</label><input type="text" name="laptopdvd" id="laptopdvd" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopgpu">Графичка:</label><input type="text" name="laptopgpu" id="laptopgpu" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">Мрежна картичка: </label>
                                <label  class="radio-inline"><input type="radio" name="laptopnetworkcard" value="1" checked>ДА</label>
                                <label  class="radio-inline"><input type="radio" name="laptopnetworkcard" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">Камера: </label>
                                <label  class="radio-inline"><input type="radio" name="laptopcamera" value="1" checked>ДА</label>
                                <label  class="radio-inline"><input type="radio" name="laptopcamera" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label style="margin-right: 30px; display: inline-block">Оперативен систем: </label>
                                <label  class="radio-inline"><input type="radio" name="laptopos" value="1" checked>ДА</label>
                                <label  class="radio-inline"><input type="radio" name="laptopos" value="0">НЕ</label>
                            </div>

                            <div class="form-group">
                                <label for="laptopports">Порти:</label><input type="text" name="laptopports" id="laptopports" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopbattery">Батерија:</label><input type="text" name="laptopbattery" id="laptopbattery" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopdimensions">Димензии:</label><input type="text" name="laptopdimensions" id="laptopdimensions" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopweight">Тежина:</label><input type="text" name="laptopweight" id="laptopweight" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopwarranty">Гаранција:</label><input type="text" name="laptopwarranty" id="laptopwarranty" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="laptopcode">Кодно име:</label>
                                <select class="form-control" name="laptopcode" id="laptopcode">
                                    <option value="asus">Asus</option>
                                    <option value="apple">Apple</option>
                                    <option value="dell">Dell</option>
                                    <option value="lenovo">Lenovo</option>
                                    <option value="acer">Acer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="laptopprice">Цена за уред:</label><input type="text" name="laptopprice" id="laptopprice" class="form-control" required>
                            </div>

                            <input type="submit" value="Внеси" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection