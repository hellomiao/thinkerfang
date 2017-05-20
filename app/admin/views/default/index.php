<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '创业公寓投入回收概况';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>




<section class="content">

    <div class="row">



        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">产权面积</a></li>
                <li><a href="#tab_2" data-toggle="tab">投资情况</a></li>
                <li><a href="#tab_3" data-toggle="tab">投入回收</a></li>
                <li><a href="#tab_3" data-toggle="tab">空置</a></li>
                <li><a href="#tab_3" data-toggle="tab">形像进度</a></li>
                <li><a href="#tab_3" data-toggle="tab">政府招商</a></li>
                <li><a href="#tab_3" data-toggle="tab">政府租凭</a></li>
                <li><a href="#tab_3" data-toggle="tab">自主销售</a></li>
                <li><a href="#tab_3" data-toggle="tab">自主租凭</a></li>
                <li><a href="#tab_3" data-toggle="tab">地下</a></li>



            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">

                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 10px">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">月度</button>
                            <button type="button" class="btn btn-default">季度</button>
                            <button type="button" class="btn btn-default">年度</button>
                        </div></div>
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">项目总计投入回收情况</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">项目当年投入回收情况</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="bar-chart1" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>


                        </div>

                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">房屋资产项目运营投入回收表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length"><label>展示 <select name="example1_length"
                                                                                                              aria-controls="example1"
                                                                                                              class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> 条目</label></div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table  id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                                aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th rowspan="2" class="sorting_asc" tabindex="0" aria-controls="example1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 80px;vertical-align: middle;text-align: center">月份
                                                </th>
                                                <th rowspan="2"  class="sorting" tabindex="0" aria-controls="example1"
                                                    aria-label="Browser: activate to sort column ascending" style="width: 93px;text-align: center;vertical-align: middle;">
                                                    总投资
                                                </th>
                                                <th colspan="4" class="sorting" tabindex="0" aria-controls="example1"
                                                    aria-label="Platform(s): activate to sort column ascending" style="width: 240px;text-align: center;">
                                                    项目总计投入回收情况
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" colspan="3"
                                                    aria-label="CSS grade: activate to sort column ascending" style="width: 211px;text-align: center;">
                                                    项目当年投入回收情况
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" colspan="3"
                                                    aria-label="CSS grade: activate to sort column ascending" style="width: 211px;text-align: center;">
                                                    项目计划当年投入回收情况
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="width: 100px;vertical-align: middle;">总计销售金额</th>
                                                <th style="width: 100px;vertical-align: middle;">总计租赁金额</th>
                                                <th style="width: 100px;vertical-align: middle;">总计回收金额</th>
                                                <th style="width: 100px;vertical-align: middle;">总计投入回收差额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年累计投入金额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年累计收回金额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年投入回收差额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年计划投入金额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年计划收回金额</th>
                                                <th style="width: 100px;vertical-align: middle;">当年计划投入回收差额</th>
                                            </tr>

                                            </thead>
                                            <tbody>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-01</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-02</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-03</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-04</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-05</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-06</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-07</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">2016-08</td>
                                                <td>14591.26</td>
                                                <td>22386.89</td>
                                                <td>851.73</td>
                                                <td>238238.62</td>
                                                <td>8647.36</td>
                                                <td class="sorting_1">81.92</td>
                                                <td>74.31</td>
                                                <td>-7.61</td>
                                                <td>26.92</td>
                                                <td>129.48</td>
                                                <td>102.56</td>
                                            </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">每页展示10条</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled" id="example1_previous"><a href="#"
                                                                                                                        aria-controls="example1"
                                                                                                                        data-dt-idx="0"
                                                                                                                        tabindex="0">前一页</a>
                                                </li>
                                                <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1"
                                                                                      tabindex="0">1</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2"
                                                                                tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                                                tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                                                tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                                                tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                                                tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1"
                                                                                                       data-dt-idx="7"
                                                                                                       tabindex="0">下一页</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>





    </div>




</section>
<?php \common\widgets\JsBlock::begin(); ?>

<script>
    $(function () {

        //BAR CHART
        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: [
                {y: '一月', a: 1000, b: 2000},
                {y: '二月', a: 2000, b: 3000},
                {y: '三月', a: 3000, b: 4000},
                {y: '四月', a: 4000, b: 5000},
                {y: '五月', a: 5000 ,b: 6000},
                {y: '六月', a: 6000, b: 7000},
                {y: '七月', a: 7000, b: 8000}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['总投资', '总计回收金额'],
            hideHover: 'auto'
        });

        var bar1 = new Morris.Bar({
            element: 'bar-chart1',
            resize: true,
            data: [
                {y: '一月', a:100, b: 110},
                {y: '二月', a: 110, b: 120},
                {y: '三月', a: 120, b: 130},
                {y: '四月', a: 130, b: 140},
                {y: '五月', a: 140, b: 150},
                {y: '六月', a: 150, b: 160},
                {y: '七月', a: 160, b: 170}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['当年累计投入金额', '当年累计收回金额'],
            hideHover: 'auto'
        });

    });

</script>

<?php \common\widgets\JsBlock::end(); ?>
