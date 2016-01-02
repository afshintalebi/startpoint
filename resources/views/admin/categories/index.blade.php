@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div id="CategoriesGridview"></div>
        </div>
    </div>
    <script type="text/javascript">
        var pasoonDate = new PasoonDate();
        var categoryGridview = new Gridview($('div#CategoriesGridview'), {
            dataSource: '{{URL::to("admin/categories/grid")}}',
            emptyMessage: 'No Data',
            styleClass: 'table table-striped',
            paginatorPosition: 'bottom top',
            paginatorVisibility: true,
            autoIncrement: true,
            autoIncrementCaption: '#',
            id: 'CategoriesGridview',
            export: false,
            direction: 'rtl',
            extendData: {
                "_token": "{{csrf_token()}}",
            }
        });
        categoryGridview.addColumn({
            'name': 'id',
            'caption': '',
            'type': ['hidden'],
            'typeData': undefined,
            'visible': false,
            'sort': true,
            'filter': false,
        });
        categoryGridview.addColumn({
            'name': 'name',
            'caption': 'نام',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        categoryGridview.addColumn({
            'name': 'alias',
            'caption': 'نام مستعار',
            'type': ['string'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        categoryGridview.addColumn({
            'name': 'order',
            'caption': 'ترتیب',
            'type': ['number'],
            'typeData': undefined,
            'visible': true,
            'sort': true,
            'filter': true,
        });
        categoryGridview.addColumn({
            'name': 'action',
            'caption': 'عملیات',
            'type': ['html'],
            'typeData': '<a href="/admin/categories/{id}/edit" class="btn btn-info btn-xs">ویرایش</a> <a href="/admin/categories/{id}/destroy" class="btn btn-danger btn-xs">حذف</a>',
            'visible': true,
            'sort': false,
            'filter': false,
            'beforeRender': function () {
            },
            'afterRender': function () {
            },
            'beforeFilter': function () {
            },
            'afterFilter': function () {
            }
        });
        categoryGridview.setPerPage(15);
    </script>
@stop
