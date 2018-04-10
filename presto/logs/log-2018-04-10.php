<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-10 18:34:05 --> Query error: Table 'hyperext_box_platic-card-factory.rt_users' doesn't exist - Invalid query: SELECT `rt_users`.*, `rt_users`.`id` as `id`, `rt_users`.`id` as `user_id`
FROM `rt_users`
WHERE `rt_users`.`id` IS NULL
ORDER BY `rt_users`.`id` DESC
 LIMIT 1
ERROR - 2018-04-10 18:35:34 --> Query error: Table 'hyperext_box_platic-card-factory.rt_users' doesn't exist - Invalid query: SELECT `rt_users`.*, `rt_users`.`id` as `id`, `rt_users`.`id` as `user_id`
FROM `rt_users`
WHERE `rt_users`.`id` IS NULL
ORDER BY `rt_users`.`id` DESC
 LIMIT 1
ERROR - 2018-04-10 18:37:07 --> Query error: Table 'hyperext_box_platic-card-factory.rt_users' doesn't exist - Invalid query: SELECT `rt_users`.*, `rt_users`.`id` as `id`, `rt_users`.`id` as `user_id`
FROM `rt_users`
WHERE `rt_users`.`id` IS NULL
ORDER BY `rt_users`.`id` DESC
 LIMIT 1
ERROR - 2018-04-10 18:48:22 --> 404 Page Not Found: Css/base.css
ERROR - 2018-04-10 18:48:22 --> 404 Page Not Found: Css/secure.css
ERROR - 2018-04-10 18:48:30 --> 404 Page Not Found: Css/base.css
ERROR - 2018-04-10 18:48:35 --> 404 Page Not Found: Css/secure.css
ERROR - 2018-04-10 18:49:26 --> 404 Page Not Found: Css/base.css
ERROR - 2018-04-10 18:49:26 --> 404 Page Not Found: Css/secure.css
ERROR - 2018-04-10 18:49:35 --> 404 Page Not Found: Css/secure.css
ERROR - 2018-04-10 18:49:35 --> 404 Page Not Found: Css/base.css
ERROR - 2018-04-10 21:52:45 --> Query error: Table 'hyperext_box_platic-card-factory.rt_tagz' doesn't exist - Invalid query: SELECT `t`.*, `log`.*
FROM `rt_tagz` as `t`
LEFT JOIN (SELECT max(id) AS max_id, tag FROM rt_tagz_events_log WHERE event_id=1 OR event_id=9 GROUP BY tag) AS log2 ON `t`.`code` = `log2`.`tag`
LEFT JOIN `rt_tagz_events_log` AS `log` ON `log`.`id` = `log2`.`max_id`
WHERE `log`.`event_id` = 1
GROUP BY `code`
ORDER BY `created` DESC
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: active /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 22
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: inactive /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 31
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: found /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 40
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: collection /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 49
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: topay /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 59
ERROR - 2018-04-10 21:53:34 --> Severity: Notice --> Undefined variable: notrecieved /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 68
ERROR - 2018-04-10 21:53:35 --> 404 Page Not Found: Plugins/images
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: active /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 22
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: inactive /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 31
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: found /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 40
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: collection /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 49
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: topay /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 59
ERROR - 2018-04-10 21:54:05 --> Severity: Notice --> Undefined variable: notrecieved /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 68
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: active /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 22
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: inactive /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 31
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: found /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 40
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: collection /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 49
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: topay /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 59
ERROR - 2018-04-10 21:56:26 --> Severity: Notice --> Undefined variable: notrecieved /Users/pauledinaction/Documents/Projects/Hyperext/Plastic Card Factory/Site/presto/views/pages/dashboard.php 68
ERROR - 2018-04-10 22:00:13 --> 404 Page Not Found: Css/base.css
ERROR - 2018-04-10 22:00:13 --> 404 Page Not Found: Css/secure.css
ERROR - 2018-04-10 22:00:13 --> 404 Page Not Found: Images/user.svg
ERROR - 2018-04-10 22:00:13 --> 404 Page Not Found: Images/quotes-per-hour-logo.svg
ERROR - 2018-04-10 22:00:13 --> 404 Page Not Found: Images/user-black.svg
ERROR - 2018-04-10 22:00:55 --> 404 Page Not Found: Images/quotes-per-hour-logo.svg
ERROR - 2018-04-10 22:00:55 --> 404 Page Not Found: Images/user.svg
ERROR - 2018-04-10 22:00:55 --> 404 Page Not Found: Images/user-black.svg
ERROR - 2018-04-10 22:01:14 --> 404 Page Not Found: Dashboard/inbox.html
ERROR - 2018-04-10 22:01:17 --> 404 Page Not Found: Images/user-black.svg
ERROR - 2018-04-10 22:01:17 --> 404 Page Not Found: Images/user.svg
ERROR - 2018-04-10 22:01:17 --> 404 Page Not Found: Images/quotes-per-hour-logo.svg
ERROR - 2018-04-10 22:02:51 --> 404 Page Not Found: Images/user.svg
ERROR - 2018-04-10 22:02:51 --> 404 Page Not Found: Images/quotes-per-hour-logo.svg
ERROR - 2018-04-10 22:02:51 --> 404 Page Not Found: Images/user-black.svg
ERROR - 2018-04-10 22:03:45 --> 404 Page Not Found: Images/quotes-per-hour-logo.svg
ERROR - 2018-04-10 22:03:45 --> 404 Page Not Found: Images/user.svg
ERROR - 2018-04-10 22:04:22 --> 404 Page Not Found: Assets/images
