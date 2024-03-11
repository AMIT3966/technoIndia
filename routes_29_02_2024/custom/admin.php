<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::name('admin.')->group(function() {
    // login
    Route::middleware('guest:admin', 'PreventBackHistory')->group(function() {
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::post('/check', [AuthController::class, 'check'])->name('check');
    });

    // profile
    Route::middleware('auth:admin', 'PreventBackHistory')->group(function() {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('career')->group(function() {
            // Collections
            Route::prefix('collection')->group(function() {
                Route::get('/', [CategoryController::class, 'CollectionIndex'])->name('collection.list.all');
                Route::get('/create', [CategoryController::class, 'CollectionCreate'])->name('collection.create');
                Route::post('/store', [CategoryController::class, 'CollectionStore'])->name('collection.store');
                Route::get('/edit/{id}', [CategoryController::class, 'CollectionEdit'])->name('collection.edit');
                Route::post('/update', [CategoryController::class, 'CollectionUpdate'])->name('collection.update');
                Route::get('/delete/{id}', [CategoryController::class, 'CollectionDelete'])->name('collection.delete');
                Route::get('/status/{id}', [CategoryController::class, 'CollectionStatus'])->name('collection.status');
            });
            // Job Category
            Route::prefix('job-category')->group(function() {
                Route::get('/', [CategoryController::class, 'JobCategoryIndex'])->name('job_category.list.all');
                Route::get('/create', [CategoryController::class, 'JobCategoryCreate'])->name('job_category.create');
                Route::post('/store', [CategoryController::class, 'JobCategoryStore'])->name('job_category.store');
                Route::get('/edit/{id}', [CategoryController::class, 'JobCategoryEdit'])->name('job_category.edit');
                Route::post('/update', [CategoryController::class, 'JobCategoryUpdate'])->name('job_category.update');
                Route::get('/delete/{id}', [CategoryController::class, 'JobCategoryDelete'])->name('job_category.delete');
                Route::get('/status/{id}', [CategoryController::class, 'JobCategoryStatus'])->name('job_category.status');
            });
            // Vacancy
            Route::prefix('job-vacancy')->group(function() {
                Route::get('/', [JobsController::class, 'index'])->name('job.list');
                Route::get('/create', [JobsController::class, 'create'])->name('job.create');
                Route::post('/store', [JobsController::class, 'store'])->name('job.store');
                Route::get('/edit/{id}', [JobsController::class, 'edit'])->name('job.edit');
                Route::post('/update', [JobsController::class, 'update'])->name('job.update');
                Route::get('/delete/{id}', [JobsController::class, 'delete'])->name('job.delete');
                Route::get('/status/{id}', [JobsController::class, 'status'])->name('job.status');
            });
        });
        // category
        Route::prefix('category')->name('category.')->group(function() {
            Route::get('/', [CategoryController::class, 'index'])->name('list.all');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/detail/{id}', [CategoryController::class, 'detail'])->name('detail');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::get('/status/{id}', [CategoryController::class, 'status'])->name('status');
        });

        // product
        Route::prefix('product')->name('product.')->group(function() {
            Route::get('/', [ProductController::class, 'index'])->name('list.all');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/update', [ProductController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('/service/delete', [ProductController::class, 'ServiceDelete'])->name('service.delete');
            Route::get('/status/{id}', [ProductController::class, 'status'])->name('status');
        });

        // // product image
        // Route::prefix('product/image')->name('product.image.')->group(function() {
        //     Route::get('/delete/{id}', [ProductImageController::class, 'delete'])->name('delete');
        // });

        // // product manual
        // Route::prefix('product/manual')->name('product.manual.')->group(function() {
        //     Route::get('/delete/{id}', [ProductManualController::class, 'delete'])->name('delete');
        // });

        // // product datasheet
        // Route::prefix('product/datasheet')->name('product.datasheet.')->group(function() {
        //     Route::get('/delete/{id}', [ProductDatasheetController::class, 'delete'])->name('delete');
        // });

        // // case-study
        // Route::prefix('case-study')->name('case-study.')->group(function() {
        //     Route::get('/', [CaseStudyController::class, 'index'])->name('list.all');
        //     Route::get('/create', [CaseStudyController::class, 'create'])->name('create');
        //     Route::post('/store', [CaseStudyController::class, 'store'])->name('store');
        //     Route::get('/detail/{id}', [CaseStudyController::class, 'detail'])->name('detail');
        //     Route::get('/edit/{id}', [CaseStudyController::class, 'edit'])->name('edit');
        //     Route::post('/update', [CaseStudyController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [CaseStudyController::class, 'delete'])->name('delete');
        //     Route::get('/status/{id}', [CaseStudyController::class, 'status'])->name('status');
        // });

        // // service
        // Route::prefix('service')->name('service.')->group(function() {
        //     Route::get('/', [ServiceController::class, 'index'])->name('list.all');
        //     Route::get('/create', [ServiceController::class, 'create'])->name('create');
        //     Route::post('/store', [ServiceController::class, 'store'])->name('store');
        //     Route::get('/detail/{id}', [ServiceController::class, 'detail'])->name('detail');
        //     Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        //     Route::post('/update', [ServiceController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('delete');
        //     Route::get('/status/{id}', [ServiceController::class, 'status'])->name('status');
        // });

        // // lead
        // Route::prefix('lead')->name('lead.')->group(function() {
        //     Route::get('/', [LeadController::class, 'index'])->name('list.all');
        // });

        // // content
        // Route::prefix('content')->name('content.')->group(function() {
        //     // seo
        //     Route::prefix('seo')->name('seo.')->group(function() {
        //         Route::get('/', [SeoController::class, 'index'])->name('list.all');
        //         Route::get('/detail/{id}', [SeoController::class, 'detail'])->name('detail');
        //         Route::get('/edit/{id}', [SeoController::class, 'edit'])->name('edit');
        //         Route::post('/update', [SeoController::class, 'update'])->name('update');
        //     });

        //     // banner
        //     Route::prefix('banner')->name('banner.')->group(function() {
        //         Route::get('/', [BannerController::class, 'index'])->name('list.all');
        //         Route::get('/create', [BannerController::class, 'create'])->name('create');
        //         Route::post('/store', [BannerController::class, 'store'])->name('store');
        //         Route::get('/detail/{id}', [BannerController::class, 'detail'])->name('detail');
        //         Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
        //         Route::post('/update', [BannerController::class, 'update'])->name('update');
        //         Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('delete');
        //         Route::get('/status/{id}', [BannerController::class, 'status'])->name('status');
        //     });

        //     // Home
        //     Route::get('/home', [ContentController::class, 'home'])->name('home');
        //     Route::post('/home/update', [ContentController::class, 'homeUpdate'])->name('home.update');

        //     Route::get('/epc', [ContentController::class, 'epc'])->name('epc');
        //     Route::get('/careers', [ContentController::class, 'careers'])->name('careers');
        //     Route::get('/leads', [ContentController::class, 'leads'])->name('leads');
        //     Route::post('/epc/update', [ContentController::class, 'epcUpdate'])->name('epc.update');
        //     // about
        //     Route::get('/about', [ContentController::class, 'about'])->name('about');
        //     Route::post('/about/update', [ContentController::class, 'aboutUpdate'])->name('about.update');

        //     // contact
        //     Route::get('/contact', [ContentController::class, 'contact'])->name('contact');
        //     Route::post('/contact/update', [ContentController::class, 'contactUpdate'])->name('contact.update');

        //     // settings
        //     Route::get('/settings', [ContentController::class, 'settings'])->name('settings');
        //     Route::post('/settings/update', [ContentController::class, 'settingsUpdate'])->name('settings.update');
        // });
        // // Social Media
        // Route::prefix('social-media')->name('social_media.')->group(function() {
        //     Route::get('/', [SocialMediaController::class, 'index'])->name('list.all');
        //     Route::get('/create', [SocialMediaController::class, 'create'])->name('create');
        //     Route::post('/store', [SocialMediaController::class, 'store'])->name('store');
        //     Route::get('/edit/{id}', [SocialMediaController::class, 'edit'])->name('edit');
        //     Route::post('/update', [SocialMediaController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [SocialMediaController::class, 'delete'])->name('delete');
        // });
        // // Nation Product
        // Route::prefix('nation-product')->name('nation_product.')->group(function() {
        //     Route::get('/', [NationProductController::class, 'index'])->name('list.all');
        //     Route::get('/create', [NationProductController::class, 'create'])->name('create');
        //     Route::post('/store', [NationProductController::class, 'store'])->name('store');
        //     Route::get('/detail/{id}', [NationProductController::class, 'detail'])->name('detail');
        //     Route::get('/edit/{id}', [NationProductController::class, 'edit'])->name('edit');
        //     Route::post('/update', [NationProductController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [NationProductController::class, 'delete'])->name('delete');
        //     Route::get('/status/{id}', [NationProductController::class, 'status'])->name('status');
        // });
        // // Partner
        // Route::prefix('client')->name('partner.')->group(function() {
        //     Route::get('/', [PartnerController::class, 'index'])->name('list.all');
        //     Route::get('/create', [PartnerController::class, 'create'])->name('create');
        //     Route::post('/store', [PartnerController::class, 'store'])->name('store');
        //     Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit');
        //     Route::post('/update', [PartnerController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [PartnerController::class, 'delete'])->name('delete');
        // });
        // // Job
        
        // // News
        // Route::prefix('news')->name('news.')->group(function() {
        //     Route::get('/', [NewsController::class, 'index'])->name('list.all');
        //     Route::get('/create', [NewsController::class, 'create'])->name('create');
        //     Route::post('/store', [NewsController::class, 'store'])->name('store');
        //     Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        //     Route::post('/update', [NewsController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('delete');
        //     Route::get('/status/{id}', [NewsController::class, 'status'])->name('status');
        // });
        // // News Category
        // Route::prefix('news-category')->name('news_category.')->group(function() {
        //     Route::get('/', [NewsController::class, 'CategoryIndex'])->name('list.all');
        //     Route::get('/create', [NewsController::class, 'CategoryCreate'])->name('create');
        //     Route::post('/store', [NewsController::class, 'CategoryStore'])->name('store');
        //     Route::get('/edit/{id}', [NewsController::class, 'CategoryEdit'])->name('edit');
        //     Route::post('/update', [NewsController::class, 'CategoryUpdate'])->name('update');
        //     Route::get('/delete/{id}', [NewsController::class, 'CategoryDelete'])->name('delete');
        //     Route::get('/status/{id}', [NewsController::class, 'CategoryStatus'])->name('status');
        // });
        // Route::prefix('product-category')->name('product_category.')->group(function() {
        //     Route::get('/', [ProductController::class, 'ProductIndex'])->name('list.all');
        //     Route::get('/create', [ProductController::class, 'ProductCreate'])->name('create');
        //     Route::post('/store', [ProductController::class, 'ProductStore'])->name('store');
        //     Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('edit');
        //     Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('update');
        //     Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('delete');
        //     Route::get('/status/{id}', [ProductController::class, 'ProductStatus'])->name('status');
        // });
        // // Certificate
        // Route::prefix('certificate')->name('certificate.')->group(function() {
        //     Route::get('/', [CertificateController::class, 'index'])->name('list.all');
        //     Route::get('/create', [CertificateController::class, 'create'])->name('create');
        //     Route::post('/store', [CertificateController::class, 'store'])->name('store');
        //     Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('edit');
        //     Route::post('/update', [CertificateController::class, 'update'])->name('update');
        //     Route::get('/delete/{id}', [CertificateController::class, 'delete'])->name('delete');
        // });
    });

    // ckeditor custom upload adapter path
    Route::post('/ckeditor/upload', [UploadAdapterController::class, 'upload']);
});
