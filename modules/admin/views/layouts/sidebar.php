<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<!--    <a href="--><?//=\yii\helpers\Url::home()?><!--" class="brand-link">-->
<!--        <img src="/logo/logo.png" alt="УРО МООО РСО" class="brand-image img-circle elevation-3"-->
<!--             style="opacity: .8">-->
<!--        <span class="brand-text font-weight-light">Администраторская</span>-->
<!--    </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/uploads/avatars/<?= Yii::$app->user->identity->avatar ?>" class="img-circle" alt="Image"/>
            </div>
            <div class="info">
                <a  class="d-block"> <?= Yii::$app->user->identity->name ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php   if(Yii::$app->user->can('admin')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                        
                        ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/squad']],
                         ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Календарь', 'icon' => 'plus-square', 'url' => ['/admin/events']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Проверка устава', 'icon' => 'check', 'url' => ['/admin/question']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        
                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Документы', 'icon' => 'plus', 'url' => ['/admin/material']],
                        ['label' => 'Прочее', 'header' => true],

                        ['label' => 'Отряды', 'url' => ['/admin/user'], 'icon' => 'users'],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
            <?php   if(Yii::$app->user->can('regstab')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/squad']],
                        ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Календарь', 'icon' => 'plus-square', 'url' => ['/admin/events']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Проверка устава', 'icon' => 'plus-square', 'url' => ['/admin/question']],

                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Прочее', 'header' => true],

                        ['label' => 'Отряды', 'url' => ['/admin/user'], 'icon' => 'users'],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
            <?php   if(Yii::$app->user->can('mehan')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/mehan']],
                        ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Новости', 'url' => ['/admin/news'], 'icon' => 'rss'],
                        ['label' => 'Проверка устава', 'icon' => 'plus-square', 'url' => ['/admin/question']],
                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Прочее', 'header' => true],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
                        <?php   if(Yii::$app->user->can('udgu')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                         ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/udgu']],
                        ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Новости', 'url' => ['/admin/news'], 'icon' => 'rss'],
                        ['label' => 'Проверка устава', 'icon' => 'plus-square', 'url' => ['/admin/question']],
                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Прочее', 'header' => true],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
                        <?php   if(Yii::$app->user->can('egida')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/egida']],
                        ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Проверка устава', 'icon' => 'plus-square', 'url' => ['/admin/question']],
                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Прочее', 'header' => true],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
                                    <?php   if(Yii::$app->user->can('ggpi')) {
                echo \hail812\adminlte3\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/ggpi']],
                        ['label' => 'Новости', 'icon' => 'newspaper', 'url' => ['/admin/news']],
                        ['label' => 'Создать новость', 'icon' => 'plus-circle', 'url' => ['/admin/news/create']], //, 'badge' => '<span class="right badge badge-danger
                        ['label' => 'Создать мероприятие', 'icon' => 'plus-square', 'url' => ['/admin/meropriyatia/create']], //, 'badge' => '<span class="right badge badge-danger">New</span>'
                        ['label' => 'Проверка устава', 'icon' => 'plus-square', 'url' => ['/admin/question']],
                        ['label' => 'Сайт', 'header' => true],
                        ['label' => 'Штабы', 'url' => ['/admin/stabi'], 'icon' => 'house-user'],
                        ['label' => 'Руководители', 'icon' => 'users-cog', 'url' => ['/admin/pravlenie']],
                        ['label' => 'Блог', 'icon' => 'blog', 'url' => ['/admin/blog']],
                        ['label' => 'Костер+', 'icon' => 'fire', 'url' => ['/admin/koster']],
                        ['label' => 'Прочее', 'header' => true],
                        ['label' => 'Выход', 'icon' => 'sign-out-alt', 'url' => ['/admin/logout']],
                    ],
                ]);
            }  ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>