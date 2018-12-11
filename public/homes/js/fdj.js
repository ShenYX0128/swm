
// 移动事件
		$('#small').mousemove(function(e){
			$('#move').css('display','block');
			$('#big').css('display','block');
			// 获取small的左侧偏移量
			var sl = $('#small').offset().left;
			var st = $('#small').offset().top;
			console.log(sl,st);
			// 获取x和y的坐标
			var x = e.pageX;
			var y = e.pageY;
			// console.log(x,y);
			// 获取move的宽高
			var mw = $('#move').width()/2;
			var mh = $('#move').height()/2;
			// console.log(mw,mh);
			// 求出move距离small的偏移量
			var ml = x - sl -mw;
			var mt = y -st -mh;
			console.log(ml,mt);
			// 求出move的最大偏移量
			var maxl = $('#small').width()-$('#move').width();
			var maxt = $('#small').height()-$('#move').height();
			if (ml >= maxl) {
				ml = maxl;
			}
			if (ml <= 0 ) {
				ml = 0;
			}
			if (mt >= maxt) {
				mt = maxt;
			}
			if (mt <= 0) {
				mt = 0;
			}

			// 获取大图距离big的偏移量
			var bl = $('#bigImg').width() / $('#small').width() * ml;
			var bt = $('#bigImg').height() / $('#small').height() * mt;
			console.log(bl,bt);
			$('#bigImg').css('left',-bl+'px');
			$('#bigImg').css('top',-bt+'px');
			// console.log('#bigImg');
			// 获取move的偏移量
			$('#move').css('left',ml+'px');
			$('#move').css('top',mt+'px');
		})
		// 从small移动出来
		$('#small').mouseout(function(){
			$('#move').css('display','none');
			$('#big').css('display','none');
		})
		// 从鼠标移到小图上
		$('#uls').find('img').mouseover(function(){
			$(this).css('border','1px solid #e53341');
			var srcs = $(this).attr('src');
			// 改变small里面的src
			$('#small').find('img').attr('src',srcs);
			// 改变big里面的src
			$('#big').find('img').attr('src',srcs);
		})
		$('#uls').find('img').mouseout(function(){
			$(this).css('border','solid 1px white');
		})