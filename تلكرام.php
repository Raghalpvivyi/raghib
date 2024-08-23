<?php

// إعدادات البوت
$apiToken = "7244731022:AAFzlemczzF4LzAsLdKMYuAtG9JBuidziHM";
$chatId = "6776945755"; // استبدل بمعرف المستخدم
$baseUrl = "https://api.telegram.org/bot$apiToken/";

// دالة لإرسال الرسائل مع التعامل مع الأخطاء
function sendMessage($chatId, $message) {
    global $baseUrl;
    
    $url = $baseUrl . "sendMessage?chat_id=$chatId&text=" . urlencode($message);
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        error_log("فشل في إرسال الرسالة إلى Telegram.");
    }
}

// تخزين الجدول الدراسي
$schedule = [];

// التحقق من صحة الوقت
function isValidTime($time) {
    return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time);
}

// 1- كود يسمح للمستخدم العادي بتحديد عدد مواد في اليوم
function setSchedule($day, $subjects, $startTime, $endTime) {
    global $schedule;

    if (empty($subjects)) {
        sendMessage($GLOBALS['chatId'], "قائمة المواد الدراسية لا يمكن أن تكون فارغة.");
        return;
    }

    if (!isValidTime($startTime) || !isValidTime($endTime)) {
        sendMessage($GLOBALS['chatId'], "الوقت المدخل غير صحيح. يجب أن يكون بصيغة HH:MM.");
        return;
    }

    $schedule[$day] = [
        'subjects' => $subjects,
        'start_time' => $startTime,
        'end_time' => $endTime
    ];
}

// 2- كود ميزة التذكير
function reminder($day) {
    global $schedule, $chatId;
    
    if (isset($schedule[$day])) {
        sendMessage($chatId, "درس جديد يبدأ الآن: " . implode(", ", $schedule[$day]['subjects']));
        // تنبيه عند انتهاء الدرس
        sleep(3600); // افتراضياً 60 دقيقة
        sendMessage($chatId, "الدرس انتهى.");
    } else {
        sendMessage($chatId, "لا يوجد درس لهذا اليوم.");
    }
}

// 4- كود عند انتهاء الدرس
function checkCompletion($completed, $reason = null) {
    global $chatId;

    if ($completed) {
        sendMessage($chatId, "لقد أنجزت الدرس بالكامل.");
    } else {
        sendMessage($chatId, "لم تنجز الدرس بالكامل. السبب: " . $reason);
    }
}

// 5- كود ارسل تقرير شهر
function monthlyReport($month) {
    global $schedule, $chatId;
    
    $report = "تقرير الشهر $month:\n";
    $totalLessons = count($schedule);
    $completedLessons = 0; // هنا يمكن إضافة منطق لحساب الدروس المكتملة
    $uncompletedReasons = []; // هنا يمكن إضافة أسباب عدم الإنجاز

    foreach ($schedule as $day => $data) {
        // افترض أن كل درس في الجدول مكتمل. هنا يمكن إضافة منطق لحساب الدروس المكتملة وغير المكتملة
        $completedLessons++;
    }

    $report .= "عدد الدروس: $totalLessons\n";
    $report .= "الدروس المكتملة: $completedLessons\n";
    // إضافة المنطق لحساب الأسباب

    sendMessage($chatId, $report);
}

// 6- خيارات عرض الجدول
function showWeeklySchedule() {
    global $schedule, $chatId;

    if (empty($schedule)) {
        sendMessage($chatId, "لا يوجد جدول لهذا الأسبوع.");
        return;
    }

    $message = "جدول الأسبوع:\n";
    foreach ($schedule as $day => $data) {
        $message .= "$day: " . implode(", ", $data['subjects']) . " من " . $data['start_time'] . " إلى " . $data['end_time'] . "\n";
    }
    sendMessage($chatId, $message);
}

function showDailySchedule($day) {
    global $schedule, $chatId;
    
    if (isset($schedule[$day])) {
        $data = $schedule[$day];
        $message = "$day: " . implode(", ", $data['subjects']) . " من " . $data['start_time'] . " إلى " . $data['end_time'];
        sendMessage($chatId, $message);
    } else {
        sendMessage($chatId, "لا يوجد جدول لهذا اليوم.");
    }
}

// مثال على الاستخدام
setSchedule("الإثنين", ["رياضيات", "علوم"], "10:00", "11:00");
reminder("الإثنين");
checkCompletion(false, "لم أتمكن من التركيز");
monthlyReport("أكتوبر");
showWeeklySchedule();
showDailySchedule("الإثنين");

?>
