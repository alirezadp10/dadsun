<div lang="fa" dir="rtl">

- توانایی ورود به سیستم برای ثبت اطلاعات (از سیستم ثبت نام خود لاراول استفاده شود)

- قابلیت CRUD (ایجاد / خواندن / به روز رسانی / حذف) برای دو آیتم:
شرکت ها و کارکنان.
- جدول شرکت ها شامل این فیلد ها می باشد:
  * نام (مورد نیاز)
  * ایمیل
  * وب سایت
- جدول کارکنان شامل این فیلد ها می باشد: 
  * نام (مورد نیاز)
  * نام خانوادگی (مورد نیاز)
  * شرکت (کلید خارجی شرکت ها)
  * ایمیل
  * تلفن

- برای این کار از متدهای اصلی لاراول استفاده شود:

resource controllers with default methods – index, create, store etc.
- فقط کاربرانی که لاگین کردن و آیدی آنها زوج می باشد حق ویرایش اطلاعات خود را دارند
- رعایت نکات زیر الزامی میباشد:
  * MVC
  * Auth 
  * CRUD and Resource Controllers
  * Eloquent and Relationships
  * Database migrations and seeds

- برای شرکت ها عکسی با عنوان لوگو لازم دارم اندازه عکس بعد از آپلود باید در سایز 150*150 تغییر یابد
از کتابخانه زیر برای اینکار استفاده شود
http://image.intervention.io

- بعد ساخته شدن شرکت یک پیام به صورت نوتیفیکیشن برای کاربر نمایش داده شود که شرکت شما ثبت شد.
این پیام یک بار باید در صفحه لیست شرکت ها نمایش نمایش داده شود.

- بعد ثبت شرکت یک ایمیل باید ارسال شود(لازم نیست واقعا ایمیلی ارسال شود از log استفاده شود برای ارسال ایمیل(یعنی داخل فایل env جا گذاری شود  MAIL_DRIVER=log))
برای ارسال ایمیل از سیستم های جاب و ایونت استفاده شود
توضیحات : یک ایونت نیاز داریم که هر موقع شرکت ثبت شد یک کاری رو انجام بده
مرحله دوم ایجاد یک جاب هستش ارسال ایمیل رو بر عهده داره
نیاز به تعریف صف در این مرحله نیست

- مرحله بعد
از اطلاعات شرکت ها و کارکنان خروجی به صورت جیسون نیاز داریم
از متدهای API Resources  استفاده شود
نیاز نیست از روت api استفاده شود فقط خروجی مهم میباشد

- مرحله بعدی
هم برای شرکت ها و هم برای کارکنان آنها باید بتوان نظر ثبت کرد
یک جدول با عنوان کامنت باید داشته باشیم و کامنت های هر دو مدل کاربر و شرکت باید در این جدول  ثبت شود
دو کامنت اخر هر کاربر و شرکت در لیست شرکت ها و کارکنان باید نمایش داده شود(طراحی گرافیکی اصلا مهم نیست فقط پیاده سازی)

</div>
