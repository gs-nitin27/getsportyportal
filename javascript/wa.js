 var before=" "
      var current=""
      var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")

      function countdown(yr,m,d)
      {
      theyear=yr;
      themonth=m;
      theday=d;
      var today=new Date()
      var todayy=today.getFullYear();
      if (todayy < 3000)
      todayy=todayy;
      var todaym=today.getMonth()
      var todayd=today.getDate()
      var todayh=today.getHours()
      var todaymin=today.getMinutes()
      var todaysec=today.getSeconds()
      var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec
      futurestring=montharray[m-1]+" "+d+", "+yr
      dd=Date.parse(futurestring)-Date.parse(todaystring)
      dday=Math.floor(dd/(60*60*1000*24)*1)
      dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
      dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
      dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
      if(dday==0&&dhour==0&&dmin==0&&dsec==1){
      document.forms.count.count2.value=current
      return
      }
      else
            document.forms.count.count2.value="    "+dday+ "         "+dhour+"        "+dmin+"           "+dsec+"   "+before
      setTimeout("countdown(theyear,themonth,theday)",1000)
      }
      //enter the count down date using the format year/month/day
      countdown(2016,10,15);
      