!(function(e) {
  (jQuery.ptTimeSelect = {}),
    (jQuery.ptTimeSelect.version = '__BUILD_VERSION_NUMBER__'),
    (jQuery.ptTimeSelect.options = {
      containerClass: void 0,
      containerWidth: '22em',
      hoursLabel: 'Hour',
      minutesLabel: 'Minutes',
      setButtonLabel: 'Set',
      popupImage: void 0,
      onFocusDisplay: !0,
      zIndex: 10,
      onBeforeShow: void 0,
      onClose: void 0
    }),
    (jQuery.ptTimeSelect._ptTimeSelectInit = void jQuery(document).ready(
      function() {
        if (!jQuery('#ptTimeSelectCntr').length) {
          jQuery('body').append(
            '<div id="ptTimeSelectCntr" class="">        <div class="ui-widget ui-widget-content ui-corner-all">        <div class="ui-widget-header ui-corner-all">            <div id="ptTimeSelectCloseCntr" style="float: right;">                <a href="javascript: void(0);" onclick="jQuery.ptTimeSelect.closeCntr();"                         onmouseover="jQuery(this).removeClass(\'ui-state-default\').addClass(\'ui-state-hover\');"                         onmouseout="jQuery(this).removeClass(\'ui-state-hover\').addClass(\'ui-state-default\');"                        class="ui-corner-all ui-state-default">                    <span class="ui-icon ui-icon-circle-close">X</span>                </a>            </div>            <div id="ptTimeSelectUserTime" style="float: left;">                <span id="ptTimeSelectUserSelHr">1</span> :                 <span id="ptTimeSelectUserSelMin">00</span>                 <span id="ptTimeSelectUserSelAmPm">AM</span>            </div>            <br style="clear: both;" /><div></div>        </div>        <div class="ui-widget-content ui-corner-all">            <div>                <div class="ptTimeSelectTimeLabelsCntr">                    <div class="ptTimeSelectLeftPane" style="width: 50%; text-align: center; float: left;" class="">Hour</div>                    <div class="ptTimeSelectRightPane" style="width: 50%; text-align: center; float: left;">Minutes</div>                </div>                <div>                    <div style="float: left; width: 50%;">                        <div class="ui-widget-content ptTimeSelectLeftPane">                            <div class="ptTimeSelectHrAmPmCntr">                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);"                                         style="display: block; width: 45%; float: left;">AM</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);"                                         style="display: block; width: 45%; float: left;">PM</a>                                <br style="clear: left;" /><div></div>                            </div>                            <div class="ptTimeSelectHrCntr">                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">1</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">2</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">3</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">4</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">5</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">6</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">7</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">8</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">9</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">10</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">11</a>                                <a class="ptTimeSelectHr ui-state-default" href="javascript: void(0);">12</a>                                <br style="clear: left;" /><div></div>                            </div>                        </div>                    </div>                    <div style="width: 50%; float: left;">                        <div class="ui-widget-content ptTimeSelectRightPane">                            <div class="ptTimeSelectMinCntr">                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">00</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">05</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">10</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">15</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">20</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">25</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">30</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">35</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">40</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">45</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">50</a>                                <a class="ptTimeSelectMin ui-state-default" href="javascript: void(0);">55</a>                                <br style="clear: left;" /><div></div>                            </div>                        </div>                    </div>                </div>            </div>            <div style="clear: left;"></div>        </div>        <div id="ptTimeSelectSetButton">            <a href="javascript: void(0);" onclick="jQuery.ptTimeSelect.setTime()"                    onmouseover="jQuery(this).removeClass(\'ui-state-default\').addClass(\'ui-state-hover\');"                         onmouseout="jQuery(this).removeClass(\'ui-state-hover\').addClass(\'ui-state-default\');"                        class="ui-corner-all ui-state-default">                SET            </a>            <br style="clear: both;" /><div></div>        </div>        \x3c!--[if lte IE 6.5]>            <iframe style="display:block; position:absolute;top: 0;left:0;z-index:-1;                filter:Alpha(Opacity=\'0\');width:3000px;height:3000px"></iframe>        <![endif]--\x3e    </div></div>'
          );
          var t = jQuery('#ptTimeSelectCntr');
          t.find('.ptTimeSelectMin').bind('click', function() {
            jQuery.ptTimeSelect.setMin(e(this).text());
          }),
            t.find('.ptTimeSelectHr').bind('click', function() {
              jQuery.ptTimeSelect.setHr(e(this).text());
            }),
            e(document).mousedown(jQuery.ptTimeSelect._doCheckMouseClick);
        }
      }
    )),
    (jQuery.ptTimeSelect.setHr = function(e) {
      'am' == e.toLowerCase() || 'pm' == e.toLowerCase()
        ? jQuery('#ptTimeSelectUserSelAmPm')
            .empty()
            .append(e)
        : jQuery('#ptTimeSelectUserSelHr')
            .empty()
            .append(e);
    }),
    (jQuery.ptTimeSelect.setMin = function(e) {
      jQuery('#ptTimeSelectUserSelMin')
        .empty()
        .append(e);
    }),
    (jQuery.ptTimeSelect.setTime = function() {
      var e =
        jQuery('#ptTimeSelectUserSelHr').text() +
        ':' +
        jQuery('#ptTimeSelectUserSelMin').text() +
        ' ' +
        jQuery('#ptTimeSelectUserSelAmPm').text();
      jQuery('.isPtTimeSelectActive').val(e), this.closeCntr();
    }),
    (jQuery.ptTimeSelect.openCntr = function(e) {
      jQuery.ptTimeSelect.closeCntr(),
        jQuery('.isPtTimeSelectActive').removeClass('isPtTimeSelectActive');
      var t = jQuery('#ptTimeSelectCntr'),
        i = jQuery(e)
          .eq(0)
          .addClass('isPtTimeSelectActive'),
        a = i.data('ptTimeSelectOptions'),
        s = i.offset();
      (s['z-index'] = a.zIndex),
        (s.top = s.top + i.outerHeight()),
        a.containerWidth && (s.width = a.containerWidth),
        a.containerClass && t.addClass(a.containerClass),
        t.css(s);
      var l = 1,
        c = '00',
        r = 'AM';
      if (i.val()) {
        var d = /([0-9]{1,2}).*:.*([0-9]{2}).*(PM|AM)/i.exec(i.val());
        d && ((l = d[1] || 1), (c = d[2] || '00'), (r = d[3] || 'AM'));
      }
      t
        .find('#ptTimeSelectUserSelHr')
        .empty()
        .append(l),
        t
          .find('#ptTimeSelectUserSelMin')
          .empty()
          .append(c),
        t
          .find('#ptTimeSelectUserSelAmPm')
          .empty()
          .append(r),
        t
          .find('.ptTimeSelectTimeLabelsCntr .ptTimeSelectLeftPane')
          .empty()
          .append(a.hoursLabel),
        t
          .find('.ptTimeSelectTimeLabelsCntr .ptTimeSelectRightPane')
          .empty()
          .append(a.minutesLabel),
        t
          .find('#ptTimeSelectSetButton a')
          .empty()
          .append(a.setButtonLabel),
        a.onBeforeShow && a.onBeforeShow(i, t),
        t.slideDown('fast');
    }),
    (jQuery.ptTimeSelect.closeCntr = function(t) {
      var i = e('#ptTimeSelectCntr');
      if (1 == i.is(':visible')) {
        if (
          0 == jQuery.support.tbody &&
          !(i[0].offsetWidth > 0 || i[0].offsetHeight > 0)
        )
          return;
        if (
          (jQuery('#ptTimeSelectCntr')
            .css('display', 'none')
            .removeClass()
            .css('width', ''),
          t || (t = e('.isPtTimeSelectActive')),
          t)
        ) {
          var a = t
            .removeClass('isPtTimeSelectActive')
            .data('ptTimeSelectOptions');
          a && a.onClose && a.onClose(t);
        }
      }
    }),
    (jQuery.ptTimeSelect._doCheckMouseClick = function(t) {
      e('#ptTimeSelectCntr:visible').length &&
        !jQuery(t.target).closest('#ptTimeSelectCntr').length &&
        jQuery(t.target).not('input.isPtTimeSelectActive').length &&
        jQuery.ptTimeSelect.closeCntr();
    }),
    (jQuery.fn.ptTimeSelect = function(t) {
      return this.each(function() {
        if ('input' == this.nodeName.toLowerCase()) {
          var i = jQuery(this);
          if (i.hasClass('hasPtTimeSelect')) return this;
          var a = {};
          if (
            ((a = e.extend(a, jQuery.ptTimeSelect.options, t)),
            i.addClass('hasPtTimeSelect').data('ptTimeSelectOptions', a),
            a.popupImage || !a.onFocusDisplay)
          ) {
            var s = jQuery(
              '<span>&nbsp;</span><a href="javascript:" onclick="jQuery.ptTimeSelect.openCntr(jQuery(this).data(\'ptTimeSelectEle\'));">' +
                a.popupImage +
                '</a>'
            ).data('ptTimeSelectEle', i);
            i.after(s);
          }
          return (
            a.onFocusDisplay &&
              i.focus(function() {
                jQuery.ptTimeSelect.openCntr(this);
              }),
            this
          );
        }
      });
    });
})(jQuery);
