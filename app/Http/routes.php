<?php

Route::get('/home', function () {
    return redirect("/");
});

Route::group(['middleware' => 'web'], function () {

    Route::group(['prefix' => 'tease.me'], function(){
        Route::auth();
    });

    Route::group(['middleware' => 'auth','namespace' => 'System','prefix' => 'admin'], function(){

        Route::get('/', 'IndexController@index');//后台首页
        Route::get('/top', 'VisualController@top');
        Route::get('/sales_amount', 'VisualController@sales_amount');
        Route::resource('category', 'CategoryController');//分类

        Route::group(['middleware' => 'role:owner|self'], function(){
            Route::get('/article/consumer', 'ArticleController@consumer');//用户组
            Route::get('/article/{article_id}/show', 'ArticleController@show');//用户组show
        });

        Route::get('/info', 'AuditController@info');//邮件
        Route::post('/info/store', 'AuditController@store');//邮件
        Route::delete('/info/delete', 'AuditController@delete');//删除邮件
        Route::put('/article/consumer_update/{id}', 'ArticleController@consumer_update');//更新
        Route::patch('/article/is_something', 'ArticleController@is_something');
        Route::delete('/article/destroy_gallery', 'ArticleController@destroy_gallery');//删除相册图片
        Route::delete('/article/destroy_checked', 'ArticleController@destroy_checked');//多选删除
        Route::group(['middleware' => 'role:admin'], function(){
            Route::get('/audit/audit', 'AuditController@audit');//待审核列表
            Route::get('/audit/{id}/show', 'AuditController@show');//详情
            Route::get('/audit/{id}/pass', 'AuditController@pass');//审核通过
            Route::get('/audit/{id}/stop', 'AuditController@stop');//未通过
            Route::get('/audit/stop_list', 'AuditController@stop_list');//未通过列表
            Route::resource('audit', 'AuditController');
            Route::resource('article', 'ArticleController');
        });

        Route::group(['middleware' => 'role:admin'], function(){
            Route::get('/trash/{id}/restore', 'TrashController@restore');//还原
            Route::delete('/trash/{id}/forceDelete', 'TrashController@forceDelete');//删除
            Route::get('/trash/select_restore', 'TrashController@select_restore');//多选还原
            Route::delete('/trash/select_del', 'TrashController@select_del');//多选删除
            Route::resource('trash', 'TrashController');//内容回收站
        });

        Route::get('/setting/change_password', 'SettingController@change_password');//修改密码页面
        Route::patch('/setting/change_password', 'SettingController@update_password');//修改
        Route::get('/setting/clear_cache', 'SettingController@clear_cache');//清除缓存
        Route::get('/setting/cache','SettingController@cache');

        Route::group(['middleware' => 'role:admin'], function(){
            Route::delete('/setting/del_user/{id}', 'SettingController@del_user');//删除管理员
            Route::get('/setting/author', 'SettingController@author');//管理员列表
            Route::post('/setting/do_register', 'SettingController@do_register');//新增管理员
            Route::put('/setting/config', 'SettingController@update');//更新站点信息
            Route::get('/setting/config','SettingController@config');//站点信息
            Route::resource('setting', 'SettingController');//设置，包含个人信息
        });

        Route::group(['middleware' => 'role:admin'], function(){
            Route::get('/about/{id}','AboutController@index');//关于我们
            Route::put('/about/update/{id}','AboutController@update');//更新关于我们
            Route::delete('/adv/delete', 'AdvController@delete');//删除
            Route::resource('adv','AdvController');//广告管理
            Route::patch('/flink/url', 'FlinkController@update_url');
            Route::patch('/flink/name', 'FlinkController@update_name');
            Route::delete('/flink/delete', 'FlinkController@delete');//删除
            Route::resource('flink','FlinkController');//友情链接
            Route::get('/comment/all_comment','CommentController@all_comment');
        });
        Route::get('/comment/{id}/del_show', 'CommentController@del_show');//显示用户删除留言
        Route::delete('/comment/forceDelete', 'CommentController@forceDelete');//删除
        Route::delete('/comment/destroy_checked', 'CommentController@destroy_checked');//多选删除
        Route::delete('/comment/delete', 'CommentController@delete');//删除留言
        Route::resource('comment','CommentController');//留言管理


    });


    Route::group(['namespace' => 'Home'], function(){
        Route::get('/', 'IndexController@index');//首页
        Route::get('/list/{id}', 'ListController@index');
        Route::get('/about/{id}/{title}', 'AboutController@index');
        Route::resource('list', 'ListController');
        Route::get('/map', 'MapController@index');//地图
        Route::get('/list', 'MapController@all');
        Route::group(['prefix' => 'zxtc'], function(){
            Route::get('/index/{id}', 'ProductController@index');//项目首页
            Route::get('/project/{id}', 'ProductController@index');//企业介绍
            Route::get('/advantages/{id}', 'ProductController@index');//项目优势
            Route::get('/system/{id}', 'ProductController@index');//服务体系
            Route::get('/contact/{id}', 'ProductController@index');//联系我们
            Route::resource('product', 'ProductController');//文章//内容页
        });
        Route::get('/search','SearchController@search');//搜索

        Route::get('captcha/mews','ListController@mews');
        Route::post('/check','ListController@check');
    });
    Route::post('/upload', 'FileController@upload');
    Route::post('/upload_icon', 'FileController@upload_icon');
    Route::post('/banner_upload', 'FileController@banner_upload');
    Route::post('/brand_upload', 'FileController@brand_upload');

});
