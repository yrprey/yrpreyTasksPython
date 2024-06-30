# YrpreyTasksPython

![yprey](https://i.imgur.com/zHoDJG9_d.webp?maxwidth=760&fidelity=grand)

**Backend created by [Fernando Mengali](https://www.linkedin.com/in/fernando-mengali-273504142/)**

YrpreyTasksPython is a framework based tasks management systems. The framework perfectly simulates a tasks system that can help a user in managing taks and actions, but it has vulnerabilities based on OWASP TOP 10 WebApp 2021. The framework was developed to teach and learn details in Pentest (testing penetration) and Application Security. In the context of Offensive Security, vulnerabilities contained in web applications can be identified, exploited and compromised. For application security professionals and experts, the framework provides an in-depth understanding of code-level vulnerabilities. Yrprey, making it valuable for educational, learning and teaching purposes in the field of Information Security. For more information about the vulnerabilities, we recommend exploring the details available at [yrprey.com](https://yrprey.com).

#### Features
 - Based on OWASP's top 10 vulnerabilities for Web Application.

Initially, a non-registered user only has access to the index.php page. The user can authenticate to the system with the credentials admin and the password 1234567890. Functionalities include adding tasks, edit and removals.
yrprey tasks is not recommended for personal or commercial use, only for laboratory use and learning about exploiting and patching vulnerabilities.

## The framework was written with the following technologies:

* 1º - Python
* 2º - PHP
* 3º - Bootstrap
* 4º - JavaScript
* 5º - MySQL
* 5º - Ajax


#### List of Vulnerabilities

In this section, we have a comparison of the vulnerabilities present in the framework with the routes and a comparison between the OWASP TOP 10 Web Application.
This table makes it easier to understand how to exploit vulnerabilities in each systemic function.
In the last two columns we have a parenthesis and the scenario associated with the OWASP TOP 10 Web Applications, facilitating the understanding of the theory described on the page https://owasp.org/www-project-top-ten/.
After understanding the scenario and the vulnerable route, the process of identifying and exploiting vulnerabilities becomes easier. If you are an Application Security professional, knowing the scenario and routes of endpoints makes the process of identifying and correcting vulnerabilities easier with manual Code Review Security techniques or automated SAST, SCA and DAST analyses

Complete table with points vulnerables, vulnerability details and a comparison between OWASP TOP 10 Web Application vulnerabilities:

|Qtde |          **OWASP TOP 10**                          |**Method**|            **Path**            |            **Details**                            |
|----:|:--------------------------------------------------:|:--------:|:------------------------------:|:-------------------------------------------------:|
| 01  |  A01:2021-Broken Access Control                    |   POST   |  /about.php?img=logo.webp      |                  Path Traversal                   |
| 02  |  A01:2021-Broken Access Control                    |   POST   |  /user.php                     |             View all users data                   |
| 03  |  A01:2021-Broken Access Control                    |   POST   |  /index.php                    |                  Passowrd Weak                    |
| 04  |  A02:2021-Cryptographic Failures                   |   POST   |  /index.php                    |             Store password with base64            |
| 05  |  A03:2021-Injection                                |   POST   |  /index.php                    |        SQL Injection - Authentication             |
| 06  |  A03:2021-Injection                                |   POST   |  /index.php                    |            Cross-Site Request Forgery             |
| 07  |  A03:2021-Injection                                |   POST   |  /home.php                     |            Cross-Site Request Forgery             |
| 08  |  A03:2021-Injection                                |   POST   |  /tasks?action=add...          |                    SQL Injection                  |
| 09  |  A03:2021-Injection                                |   POST   |  /tasks?action=update...       |                    SQL Injection                  |
| 10  |  A03:2021-Injection                                |   POST   |  /tasks?action=delete...       |                    SQL Injection                  |
| 11  |  A03:2021-Injection                                |   GET    |  /tasks?action=toggle...       |                    SQL Injection                  |
| 12  |  A03:2021-Injection                                |   GET    |  /tasks?action=list...         |                    SQL Injection                  |
| 13  |  A03:2021-Injection                                |   POST   |  /tasks?action=update...       |             Remote code Execution - RCE           |
| 14  |  A03:2021-Injection                                |   POST   |  /tasks?action=delete...       |             Remote code Execution - RCE           |
| 15  |  A03:2021-Injection                                |   POST   |  /tasks?action=toggle...       |             Remote code Execution - RCE           |
| 16  |  A03:2021-Injection                                |   POST   |  /tasks?action=list...       |             Remote code Execution - RCE             |
| 17  |  A03:2021-Injection                                |   GET    |  /logout.php?url=http://...    |          Redirect to other url                    | 
| 18  |  A02:2021-Cryptographic Failures                   |   POST   |  /.idea/workspace.xml          |                    File Exposure                  |
| 19  |  A02:2021-Cryptographic Failures                   |   GET    |  /app.js                       |       Hardcode password - File Exposure           |
| 20  |  A02:2021-Cryptographic Failures                   |   GET    |  /app.js                       |                     Debug Active                  |
| 21  |  A02:2021-Cryptographic Failures                   |   POST   |  /htdocs/.htaccess             |                    File Exposure                  |
| 22  |  A02:2021-Cryptographic Failures                   |   POST   |  /Root                         |                    File Exposure                  |
| 23  |  A05:2021-Security Misconfiguration                |   GET    |  /phpinfo.php                  |                    File Exposure                  |
| 24  |  A05:2021-Security Misconfiguration                |   GET    |  /bkp.zip                      |                    File Exposure                  |
| 25  |  A02:2021-Cryptographic Failures                   |   POST   |  /db.php.old                   |             Credential harcoded database          |
| 26  |  A02:2021-Cryptographic Failures                   |   POST   |  /db.php.txt                   |             Credential harcoded database          |
| 27  |  A05:2021-Security Misconfiguration                |   POST   |  /index.php                    |   Intercept Credentials with Sniffer or BurpSuite |
| 28  |  A05:2021-Security Misconfiguration                |   GET    |  /WS_FTP/WS_FTP.LOG            |            Misconfiguration                       |
| 29  |  A05:2021-Security Misconfiguration                |   GET    |  /ssh-key.priv                 |            Misconfiguration                       |
| 30  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied HttpOnly         |
| 31  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |  Header - Not Definied Frame Options Header       |
| 32  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied HSTS             |
| 33  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |   Header - Not Definied Content Security Policy   |
| 34  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied XSS Protection   |
| 35  |  A05:2021-Security Misconfiguration                |   GET    |  /adminer.php                  |            Adminer default                        |
| 36  |  A05:2021-Security Misconfiguration                |   GET    |  /phpminiadmin.php             |            PHP Mini Admin default                 |
| 37  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery-1.5.1.js           |  XSS to function: html,append,load,after..        |
| 38  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery-1.5.1.js           |  Prototype Pollution to function: extend          |
| 39  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           |  Prototype Pollution to function: zipObjectDeep.. |
| 40  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           |            Code Injection across template         |
| 41  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           | ReDoS to functions: toNumber, trim, trimEnd       |
| 42  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/bootstrap-4.1.3.js        | Prototype Pollution to function: data-template... |
| 43  |  A07:2021-Identif. and Authentication Failures     |   POST   |  /index.php                    |             username enumeration                  |
| 44  |  A07:2021-Identif. and Authentication Failures     |   N/A    |  /Change cache cookie to admin |  Session Hijacking (Manipulation Cookie)          |
| 45  |  A10:2021 – Server-Side Request Forgery (SSRF)     |   GET    |  /tasks                        |             Server-Side Request Forgery           |
| 46  |  A09:2021-Security Logging and Monitoring Failures |   POST   |  /tasks?action=delete...       |        Insufficient Logging and Monitoring        |
| 47  |  A09:2021-Security Logging and Monitoring Failures |   GET    |  /tasks?action=toggle...       |        Insufficient Logging and Monitoring        |
| 48  |  A09:2021-Security Logging and Monitoring Failures |   GET    |  /tasks?action=list...         |        Insufficient Logging and Monitoring        |
| 49  |  A09:2021-Security Logging and Monitoring Failures |   POST   |  /tasks?action=update...       |        Insufficient Logging and Monitoring        |



## How Install

* 1º - Install and configure Apache, PHP and MySQL on your Linux
* 2º - Import the YRpreyPHP files to /var/www/
* 3º - Create a database named "yrprey"
* 4º - Import the yrprey.sql into the database.
* 5º - Access the address http://localhost in your browser
* 6º - In php ini change allow_url_include to "On".
* 7º - Add the tasks.py file. Necessary packages for tasks.py to run successfully.
* 8º - In the Gitbash terminal or Windows Command Prompt, install the packages.


```python

pip install Flask

pip install flask-cors

pip install pymysql

```

9º - In the Gitbash terminal or Windows Command Prompt, start the server with command.
```python
python tasks.py
```

10º - In the Gitbash terminal, give write permission to the file file.php.
```python
chmod 777 file.php
```

## Observation
You can test on Xampp or any other platform that supports PHP and MySQL.

## Reporting Vulnerabilities

Please, avoid taking this action and requesting a CVE!

The application intentionally has some vulnerabilities, most of them are known and are treated as lessons learned. Others, in turn, are more "hidden" and can be discovered on your own. If you have a genuine desire to demonstrate your skills in finding these extra elements, we suggest you share your experience on a blog or create a video. There are certainly people interested in learning about these nuances and how you identified them. By sending us the link, we may even consider including it in our references.
