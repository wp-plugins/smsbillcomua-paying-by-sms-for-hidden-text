=== Plugin Name ===
Contributors: smsbill.com.ua 
Donate link: http://smsbill.com.ua
Tags: sms-key, selling by sms, hidden text, sms gateway, sms billing
Requires at least: 3.1.1
Tested up to: 3.1.1
Stable tag: 1.0

This plugin hides defined text until user pay by SMS.

== Description ==

To use this plug-in you need to register in "Sms Billing Ukraine" system http://smsbill.com.ua.
You can get an additional info about "Get Password" by the link http://smsbill.com.ua/sms-parol and "Time started" by here http://smsbill.com.ua/sms-parol.
To hide text you should place it between two special tags like this: [smsbill_getpass] hidden text [/smsbill_getpass].
Instead of text that inserted into tags [smsbill_pass] [/smsbill_pass] there will be shown a pay form with instructions.
Until user pays by sms for access he doesn't see your hidden text. He should select his country and operator to get text sms. 
After that he gets a text for sms snd short number. He should send it by sms to the short number and get password in forwarded message. 
This password he should input into field.

��� ������������� �������, ���������� ����������� � ������� �������� "��� ������� �������" http://smsbill.com.ua.
�� ������ ������ �������������� ����������� �� ������ "������ ������" �� ������ http://smsbill.com.ua/sms-parol � ������ "����� �����" http://smsbill.com.ua/sms-parol-vremya-poshlo. 
����� ������ ������������ ����� �� �������� �����, ��� ���������� ��������� ����� ����� ������������ ������, ��� ���: 
[smsbill_getpass] �����, ������� ����� ����� [/smsbill_getpass].
������ �������� ������, �� ����� ����� �������� ���������� � ���-�������. ������������ ������ ����� ��������� ��� �� �������� ����� � �������� � �������� ��� ������ �������. 
����� ����� ����������� ������ � ���������������� ��� ���� ����, ������������ ����� �������� �������� �� ������ �� ����� �������.

== Installation ==

1. Upload folder of the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin "SmsBill.com.ua Service" through the 'Plugins' menu in WordPress
3. In `Settings` find "SmsBill Service". Here you should identify the following:
- ID service thet you create in the sms-billing;
- site charset;
- optional you can define link to your css file if needed.


1. ���������� ����� ������� � /wp-content/plugins/ �� ��������.
2. ����������� � ����� ������ �����. ������� � ������ "�������" � ����������� ������ "SmsBill.com.ua Service"
3. � �������� "���������" ������� "SmsBill ������" � ������� ������. ����� ���������� �������:
- ID ������, ����������� � ���-��������;
- ��������� �����;
- ����������� ����� ������� ���� � ������ CSS �����.
������� ������ "���������".

== Frequently Asked Questions ==

= A question that someone might have =

= What about foo bar? =

== Screenshots ==

1. This is setting screenshot-1.jpg
2. This is paying form screenshot-2.jpg

== Changelog ==

First upload

== Upgrade Notice ==

No upgrades yet

== Arbitrary section ==


== A brief Markdown Example ==