
<?php $this->load->view('head/head'); ?>	
<?php $this->load->view('topMenu/menu'); ?>

<!-- equity -->
<div class="equity">
    <div class="container">
        <div class="col-md-12 w3_equity_market_analysis">
            <div class="w3_equity_market_analysis_grid">

                <div style="float: right;">
                    <a href="<?php echo base_url('WorkingDays/ViewDaysCreationForm'); ?>" class="btn btn-info">ΠΡΟΣΘΗΚΗ ΗΜΕΡΑΣ</a>
                    <br><br>
                </div>
                <div class="tg-wrap">
                    <h3><i class="fa fa-exchange" aria-hidden="true"></i>Ημερες Εργασιας</h3>
                    <h2>Εισάγετε τα παρακάτω στοιχεία :</h2>
                    <div class="w3_equity_market_analysis_grid_sub">
                        <table class="table table-responsive " >
                                <tr>
                                    <td>
                                        <!--  FORM -->
                                        <?php if (isset($error)) : ?>
                                            <div class="alert alert-danger" >
                                                <strong><?= $error ?></strong>
                                                <strong><?php echo validation_errors(); ?></strong>
                                            </div>                    
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_open('WorkingDays/CreateDays') ?>    
                                        <span title="Συμπληρώστε την ημέρα">
                                                <input type="text" name="name" id="name" placeholder="Ημέρα" value="<?php echo set_value('name'); ?>"  />
                                            </span>
                                    </td>
                                </tr>
                            </table>
                            <div class="progress progress-striped active">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="sr-only">100% Complete</span><b>1 0 0  %</b>
                                </div>
                            </div>
                            <div class="btn btn-group-justified">
                                <p><?php echo form_submit('submit', 'ΠΡΟΣΘΗΚΗ'); ?></p>
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