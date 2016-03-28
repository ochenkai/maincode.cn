<?php
/**
 * Created by PhpStorm.
 * User: chenkai
 * Date: 16/3/28
 * Time: 上午12:35
 */
$username = $_COOKIE["username"];
$profile = <<<eod
 <li class="divider-vertical">
                            </li>
                            <li id="profile" class="dropdown">
                                <a id="myUsername" data-toggle="dropdown" class="dropdown-toggle" href="#">$username<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" target="_blank">消息中心</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">个人资料</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">我的博客</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">我的书单</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">我的匿名</a>
                                    </li>
                                    <li>
                                        <a id="cancelbtn" href="javascript:void(0);">注销</a>
                                    </li>
                                </ul>
                            </li>
eod;
echo $profile;