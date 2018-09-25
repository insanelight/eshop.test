<?php

return [
	'product/([0-9]+)' => 'product/view/$1', //actionView в ProductController

	'catalog' => 'catalog/index', //actionIndex в CatalogController

	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',//actionCategory в CatalogController
	'category/([0-9]+)' => 'catalog/category/$1',//catalog -> контроллер,category -> экшен

	'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd в CartController

	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
	'cart/delete/([0-9]+)' => 'cart/delete/$1',
	'cart/checkout' => 'cart/checkout',
	'cart' => 'cart/index', // actionIndex в CartController


	'user/register' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',

	'cabinet/edit' => 'cabinet/edit',
	'cabinet/history' => 'cabinet/history',
	'cabinet' => 'cabinet/index',
	//админпанель
	//Управление товарами
	'admin/product/create' => 'adminProduct/create',
	'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
	'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
	'admin/product' => 'adminProduct/index',
	//Управление категориями
	'admin/category/create' => 'adminCategory/create',
	'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
	'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
	'admin/category' => 'adminCategory/index',
	//Управление заказами
	'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
	'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
	'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
	'admin/order' => 'adminOrder/index',

	'admin' => 'admin/index', //actionIndex в AdminController

	'contact' => 'site/contact',

	'' => 'site/index', //actionIndex в SiteController
];