@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить франшизу</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.franchise.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Наименование</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Адрес</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Телефоны: (написать все с запятой)</label>
                            <input type="text" name="phones" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Опуб.</label>
                            <select name="active" class="form-control">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Картинка</label>
                            <input type="file" name="file">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop