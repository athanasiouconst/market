<?php $this->load->view('head/head'); ?>	
<?php $this->load->view('topMenu/menu'); ?>
<!-- //navigation -->
    <div class="col-md-12 w3_equity_market_analysis" style="padding-left:20%; width: 80%;">
        <div class="w3_equity_market_analysis_grid">
            <br><br>
            <?php echo $this->session->flashdata('success_msg'); ?>
            <?php echo $this->session->flashdata('delete_msg'); ?>
            <?php echo $this->session->flashdata('edit_msg'); ?>
        </div>
    </div>
<!-- equity -->
<div class="equity">
    <div class="container">
        <div class="col-md-12 w3_equity_market_analysis">
            <div class="w3_equity_market_analysis_grid">

<div style="float: right;">
                            <a href="<?php echo base_url('PublicMarket/ViewPublicMarketCreationForm'); ?>" class="btn btn-info">ΠΡΟΣΘΗΚΗ ΛΑΪΚΗΣ ΑΓΟΡΑΣ</a>
                            <br><br>
                        </div>
                <div class="tg-wrap">
                    <h3><i class="fa fa-exchange" aria-hidden="true"></i>ΛΑΪΚΗ ΑΓΟΡΑ</h3>
                    
                    <div class="w3_equity_market_analysis_grid_sub">
                        <div class="w3_agileits_gain_list">
                            <?php if (isset($gens)): ?>
                                <?php if (count($gen) > 0) : ?>
                                    <table id="tg-O5D5L" class="tg">
                                        <tr class="tg-l509 important">
                                            <?php foreach ($fields as $field_name => $field_display): ?>
                                                <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                                    <?php
                                                    echo anchor("PublicMarket/ViewPublicMarket/$field_name/" .
                                                            ( ($sort_order == 'asc' && $sort_by == $field_name ) ? 'desc' : 'asc' ), $field_display);
                                                    ?>
                                                </th>
                                            <?php endforeach; ?>
                                            <th>Επεξεργασία</th>
                                        </tr>
                                        <?php foreach ($gen as $gen): ?>
                                            <tr>
                                                <?php foreach ($fields as $field_name => $field_display): ?>
                                                    <td class="tg-h2ie">
                                                        <?php
                                                        echo $gen->$field_name;
                                                        ?>
                                                    <?php endforeach; ?> 
                                                </td>
                                                <td>
                                                    <?php
                                                    $kwd = $gen->kwd;
                                                    $edit = '<span title="' . $kwd . '">Επεξεργασία</span>';
                                                    $delete = '<span title="' . $kwd . '">Διαγραφή</span>';
                                                    ?>
                                                    <?php
                                                    echo anchor("PublicMarket/ViewPublicMarketEditForm/$gen->kwd", $edit, array('onClick' => "return confirm('Είστε σίγουρος για τις αλλαγές;;')"));
                                                    echo "<br>";
                                                    ?>
                                                    <?php echo anchor("PublicMarket/ViewPublicMarketDelete/$gen->kwd", $delete, array('onClick' => "return confirm('Είστε σίγουρος για τη διαγραφή;;')")); ?>    
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr><td colspan="5" class="tg-h2ie"></td></tr>
                                        <tr>

                                            <td colspan="5" class="tg-h2ie">
                                                <?php if (strlen($pagination)): ?>
                                                    <?php echo $pagination; ?>
                                                <?php endif; ?>
                                            </td>    
                                        </tr>

                                    <?php else : ?>
                                        <p><div style="padding-left: 25px;"><i>Δεν υπάρχει καταχωρημένη εγγραφή !!</i></div></p>
                                    <?php endif ?>
                                <?php endif; ?>
                            </table>
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