=== Plugin Name ===
Contributors: smsbill.com.ua 
Donate link: http://smsbill.com.ua
Tags: hidden text, selling by sms, sms billing, sms gateway, sms-key
Requires at least: 3.1.1
Tested up to: 3.3
Stable tag: 1.0

This plugin hides defined text until user pay by SMS.

== Description ==

To use this plug-in you need to register in "Sms Billing Ukraine" system http://smsbill.com.ua.
You can get an additional info about "Get Password" by the link http://smsbill.com.ua/sms-parol and "Time started" by here http://smsbill.com.ua/sms-parol.
To hide text you should place it between two special tags like this: [smsbill_pass] hidden text [/smsbill_pass].
Instead of text that inserted into tags [smsbill_pass] [/smsbill_pass] there will be shown a pay form with instructions.
Until user pays by sms for access he doesn't see your hidden text. He should select his country and operator to get text sms. 
After that he gets a text for sms snd short number. He should send it by sms to the short number and get password in forwarded message. 
This password he should input into field.

Для использования плагина, необходима регистрация в системе биллинга "СМС Биллинг Украина" http://smsbill.com.ua.
Вы можете узнать дополнительную информациию об услуге "Получи пароль" по ссылке http://smsbill.com.ua/sms-parol и услуге "Время пошло" http://smsbill.com.ua/sms-parol-vremya-poshlo. 
Чтобы скрыть оперделенный текст на странице сайта, его необходимо поместить между двумя специальными тегами, вот так: 
[smsbill_pass] текст, который будет скрыт [/smsbill_pass].
Вместо скрытого текста, на сайте будет показана инструкция о смс-платеже. Пользователь должен будет отправить смс на короткий номер и получить в ответном смс пароль доступа. 
После ввода полученного пароля в предназаначенное для него поле, пользователю будет показана страница со скрытм до этого текстом.

== Installation ==

1. Upload folder of the plugin to the `/wp-content/plugins/smsbill_getpass` directory
2. Activate the plugin "SmsBill.com.ua Service" through the 'Plugins' menu in WordPress
3. In `Settings` find "SmsBill Service". Here you should identify the following:
- ID service thet you create in the sms-billing;
- site charset;
- optional you can define link to your css file if needed.


1. Скопируйте папку плагина в /wp-content/plugins/smsbill_getpass на хостинге.
2. Залогинтесь в админ панель сайта. Зайдите в раздел "Плагины" и активируйте плагин "SmsBill.com.ua Service"
3. В разеделе "Параметры" найдите "SmsBill Сервис" и зайдите внутрь. Здесь необходимо узаказь:
- ID услуги, поключенной в смс-биллинге;
- кодировку сайта;
- опционально можно указать путь к своему CSS файлу.
Нажмите кнопку "Сохранить".

== Frequently Asked Questions ==

= A question that someone might have =

= What about foo bar? =

== Screenshots ==

1. This is a settings page screenshot-1.jpg
2. This is a paying form screenshot-2.jpg

== Changelog ==

No changes yet

== Upgrade Notice ==

No upgrades yet

== Arbitrary section ==


== A brief Markdown Example ==