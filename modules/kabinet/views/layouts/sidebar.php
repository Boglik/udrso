<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/uploads/avatars/<?= Yii::$app->user->identity->avatar ?>" class="img-circle" alt="Image"/>
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= Yii::$app->user->identity->name ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php  echo \hail812\adminlte3\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Главное меню', 'header' => true],
                    ['label' => 'Главная', 'icon' => 'home', 'url' => ['/kabinet/news']],
                    ['label' => 'Список отряда', 'icon' => 'users', 'url' => ['/kabinet/squad']],
                    ['label' => 'Мероприятия', 'icon' => 'users', 'url' => ['/kabinet/meropriyatia']],
                    ['label' => 'Социальный акции', 'icon' => 'universal-access', 'url' => ['/kabinet/social']],
//                    ['label' => 'Заказ атрибутики', 'icon' => 'ship', 'url' => ['/kabinet/zakaz']],
                    ['label' => 'Мои заявки', 'icon' => 'clone', 'url' => ['/kabinet/zayavka']],
                    ['label' => 'Обратная связь', 'icon' => 'comments', 'url' => ['/kabinet/os']],
                    ['label' => 'Прочее', 'header' => true],
                    ['label' => 'Информация об отряде', 'icon' => 'plus', 'url' => ['/kabinet/blog-site']],

                ],
            ]); ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>