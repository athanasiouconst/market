
<?php $this->load->view('head/head'); ?>	
<?php $this->load->view('topMenu/menu'); ?>

<!-- equity -->
<div class="equity">
    <div class="container">
        <div class="col-md-12 w3_equity_market_analysis">
            <div class="w3_equity_market_analysis_grid">

                <div class="tg-wrap">
                    <h3><i class="fa fa-exchange" aria-hidden="true"></i>Ημερες Εργασιας</h3>
                    <h2>Επεξεργαστείτε τα παρακάτω στοιχεία :</h2>
                    <div class="w3_equity_market_analysis_grid_sub">
                        <table class="table table-responsive " >
                            <tr>
                                <td>
                                    <!--  FORM -->
                                    <?php if (isset($error)) : ?>
                                        <div class="alert alert-danger">
                                            <strong>                                               
                                                <?php echo $this->session->flashdata('edit_msg'); ?>
                                            </strong>
                                            <strong><?php echo validation_errors(); ?></strong>
                                        </div>                    
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php if (count($edit) > 0) : ?>
                                <?php foreach ($edit as $edit): ?>
                                    <tr >
                                        <td>
                                            <?php echo form_open('Sales/ViewSalesEditSubmitForm') ?>
                                            <p><input type="hidden" size="80" id="aa" name="aa" value="<?= $edit['aa'] ?>"/>    
                                            <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                <input type="text" name="hmnia" id="hmnia" value="<?= $edit['hmnia'] ?>" placeholder="Ημερομηνία" >
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                            <input type="hidden" id="hmnia" value="<?= $edit['hmnia'] ?>" /><br/>
                                        </td>
                                    </tr>


                                    <tr>  
                                        <td>
                                            <span title="Επιλέξτε τη Λαϊκή Αγορά">
                                                <label for="laikh"></label>
                                                <select name='laikh' id='laikh' >

                                                    <option value="<?= $edit['laikh'] ?>"><?= $edit['laikh'] ?></option>
                                                    
                                                </select>
                                            </span>
                                    <tr>  
                                        <td>
                                            <span title="Επιλέξτε το προϊόν">
                                                <label for="proion"></label>
                                                <select name='proion' id='proion' >
                                                    <option value="<?= $edit['proion'] ?>"><?= $edit['proion'] ?></option>
                                                    
                                                </select>
                                            </span>

                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <span title="Συμπληρώστε την αρχική ποσότητα του προϊόντος">
                                                <input type="text" name="arx_posot" id="arx_posot" placeholder="Αρχική Ποσότητα Προϊόντος" value="<?= $edit['arx_posot'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <span title="Συμπληρώστε τη ποσότητα επιστροφής του προϊόντος">
                                                <input type="text" name="posot_epistr" id="posot_epistr" placeholder="Ποσότητα Επιστροφής Προϊόντος" value="<?= $edit['posot_epistr'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <span title="Συμπληρώστε τη ποσότητα πώλησης του προϊόντος">
                                                <input type="text" name="posot_pwlhs" id="posot_pwlhs" placeholder="Ποσότητα Πώλησης Προϊόντος" value="<?= $edit['posot_pwlhs'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <span title="Συμπληρώστε την αξία αγοράς του προϊόντος">
                                                <input type="text" name="ajia_agoras" id="ajia_agoras" placeholder="Αξία Αγοράς Προϊόντος" value="<?= $edit['ajia_agoras'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>  
                                        <td>
                                            <span title="Συμπληρώστε το κόστος του προϊόντος">
                                                <input type="text" name="kostos" id="kostos" placeholder="Κόστος Προϊόντος" value="<?= $edit['kostos'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>  
                                        <td>
                                            <p><span title="Επιλέξτε την ημέρα">
                                                    <select name='hmera' id='hmera'>
                                                        <option value="<?= $edit['hmera'] ?>"><?= $edit['hmera'] ?></option>
                                                        <option value="-1"></option>
                                                        <option value="-1">Επιλέξτε την ημέρα</option>
                                                        <option value="-1"></option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                                                        <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                                                        <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                                                        <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                                        <option value="13">13</option><option value="14">14</option><option value="15">15</option>
                                                        <option value="16">16</option><option value="17">17</option><option value="18">18</option>
                                                        <option value="19">19</option><option value="20">20</option><option value="21">21</option>
                                                        <option value="22">22</option><option value="23">23</option><option value="24">24</option>
                                                        <option value="25">25</option><option value="26">26</option><option value="27">27</option>
                                                        <option value="28">28</option><option value="29">29</option><option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <p><span title="Επιλέξτε το μήνα">
                                                    <select name='mhnas' id='mhnas'>
                                                        <option value="<?= $edit['mhnas'] ?>"><?= $edit['mhnas'] ?></option>
                                                        <option value="-1"></option>
                                                        <option value="-1">Επιλέξτε το μήνα</option>
                                                        <option value="-1"></option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                                                        <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                                                        <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                                                        <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                                    </select>
                                                </span>

                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <p><span title="Επιλέξτε το έτος">
                                                    <select name='etos' id='etos'>
                                                        <option value="<?= $edit['etos'] ?>"><?= $edit['etos'] ?></option>
                                                        <option value="-1"></option>
                                                        <option value="-1">Επιλέξτε το έτος</option>
                                                        <option value="-1"></option>
                                                        <option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option>
                                                        <option value="2019">2019</option><option value="2020">2020</option><option value="2020">2020</option>
                                                        <option value="2021">2021</option><option value="2021">2021</option><option value="2022">2022</option>
                                                        <option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option>
                                                    </select>
                                                </span>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </table>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                <span class="sr-only">100% Complete</span><b>1 0 0  %</b>
                            </div>
                        </div>
                        <div class="btn btn-group-justified">
                            <p><?php echo form_submit('submit', 'ΕΠΕΞΕΡΓΑΣΙΑ'); ?></p>
                            <?php echo form_close() ?>
                        </div> 
                    </div>
                </div>





            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //equity -->
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
    /*
     var defaults = {
     containerID: 'toTop', // fading element id
     containerHoverID: 'toTopHover', // fading element hover id
     scrollSpeed: 1200,
     easingType: 'linear' 
     };
     */

    $().UItoTop({easingType: 'easeOutQuart'});
    });</script>

<script type="text/javascript" charset="utf-8">var TgTableSort = window.TgTableSort || function(n, t){"use strict"; function r(n, t){for (var e = [], o = n.childNodes, i = 0; i < o.length; ++i){var u = o[i]; if ("." == t.substring(0, 1)){var a = t.substring(1); f(u, a) && e.push(u)} else u.nodeName.toLowerCase() == t && e.push(u); var c = r(u, t); e = e.concat(c)}return e}function e(n, t){var e = [], o = r(n, "tr"); return o.forEach(function(n){var o = r(n, "td"); t >= 0 && t < o.length && e.push(o[t])}), e}function o(n){return n.textContent || n.innerText || ""}function i(n){return n.innerHTML || ""}function u(n, t){var r = e(n, t); return r.map(o)}function a(n, t){var r = e(n, t); return r.map(i)}function c(n){var t = n.className || ""; return t.match(/\S+/g) || []}function f(n, t){return - 1 != c(n).indexOf(t)}function s(n, t){f(n, t) || (n.className += " " + t)}function d(n, t){if (f(n, t)){var r = c(n), e = r.indexOf(t); r.splice(e, 1), n.className = r.join(" ")}}function v(n){d(n, L), d(n, E)}function l(n, t, e){r(n, "." + E).map(v), r(n, "." + L).map(v), e == T?s(t, E):s(t, L)}function g(n){return function(t, r){var e = n * t.str.localeCompare(r.str); return 0 == e && (e = t.index - r.index), e}}function h(n){return function(t, r){var e = + t.str, o = + r.str; return e == o?t.index - r.index:n * (e - o)}}function m(n, t, r){var e = u(n, t), o = e.map(function(n, t){return{str:n, index:t}}), i = e && - 1 == e.map(isNaN).indexOf(!0), a = i?h(r):g(r); return o.sort(a), o.map(function(n){return n.index})}function p(n, t, r, o){for (var i = f(o, E)?N:T, u = m(n, r, i), c = 0; t > c; ++c){var s = e(n, c), d = a(n, c); s.forEach(function(n, t){n.innerHTML = d[u[t]]})}l(n, o, i)}function x(n, t){var r = t.length; t.forEach(function(t, e){t.addEventListener("click", function(){p(n, r, e, t)}), s(t, "tg-sort-header")})}var T = 1, N = - 1, E = "tg-sort-asc", L = "tg-sort-desc"; return function(t){var e = n.getElementById(t), o = r(e, "tr"), i = o.length > 0?r(o[0], "td"):[]; 0 == i.length && (i = r(o[0], "th")); for (var u = 1; u < o.length; ++u){var a = r(o[u], "td"); if (a.length != i.length)return}x(e, i)}}(document); document.addEventListener("DOMContentLoaded", function(n){TgTableSort("tg-O5D5L")});</script>

<?php $this->load->view('footerMenu/footerMenu'); ?>