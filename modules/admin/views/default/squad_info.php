
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Доска управления отрядами</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">Аватар</th>
                                        <th>Отряд</th>
                                        <th>Квартальный список</th>
                                        <th>Заявки</th>
                                        <th>Соц Акции</th>
                                        <th>Обратная связь</th>
                                        <th>Заказы</th>
                                        <th>Выездной список</th>
                                        <th></th>
                                    </tr>
                                </thead> 


                                <?php foreach ($getspo as $values => $value):  ?>
                                <tbody>
                                    <tr>
                                        <td><strong><img src="/uploads/avatars/<?= $value['avatar']?>" width="50" height="50" alt="alt"/></strong></td>
                                        <td><a href="/admin/info/view?id=<?= $value['id']?>"><?= $value['name']?></a></td>

                                         <td><a href="/admin/otryad?id=<?= $value['id']?>">Перейти</a></td>
                                       
                                         <td><a href="/admin/zayavka?id=<?= $value['id']?>"><span class="badge light badge-success"><?= $value['zayavki_spisok']?></span></a></td>
                                        <td><a href="/admin/social?id=<?= $value['id']?>"><span class="badge light badge-warning"><?= $value['action']?></span></a></td>
                              
                                          <td>
                                              <a href="/admin/os?id=<?= $value['id']?>"><span class="badge light badge-info"><?= $value['obr_svyz']?></span></a></td>
                                        </td>
                                                                                 <td>
                                              <a href="/admin/zakaz?id=<?= $value['id']?>"><span class="badge light badge-primary"><?= $value['zakazi']?></span></a></td>
                                                                                 </td>
                                                                                                                        
                                              <td><a href="/admin/viezd?id=<?= $value['id']?>">Перейти</a></td>
                                        
                                    </tr>
                                </tbody>
                                     <?php  endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
