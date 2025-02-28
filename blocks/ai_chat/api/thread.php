<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * API endpoint for retrieving thread history
 *
 * @package    block_ai_chat
 * @copyright  2024 Phat Duy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../../config.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/blocks/ai_chat/lib.php');

// if (get_config('block_ai_chat', 'restrictusage') !== "0") {
//     require_login();
// }

$thread_id = required_param('thread_id', PARAM_NOTAGS);
// $apikey = get_config('block_ai_chat', 'apikey');

// $curl = new \curl();
// $curl->setopt(array(
//     'CURLOPT_HTTPHEADER' => array(
//         'Authorization: Bearer ' . $apikey,
//         'Content-Type: application/json',
//         'OpenAI-Beta: assistants=v1'
//     ),
// ));

// $response = $curl->get("https://api.openai.com/v1/threads/$thread_id/messages");
// $response = $curl->get("http://localhost:8000/v1/threads/1/messages");
// $response = json_decode($response);

// if (property_exists($response, 'error')) {
//     throw new \Exception($response->error->message);
// }

$api_response = [];
// $message_list = array_reverse($response->data);

// Sample chat messages
$messages = [
    ["id" => 1, "role" => "user", "message" => "Hello there!"],
    ["id" => 2, "role" => "bot", "message" => "Hi! How can I help you today?"],
    ["id" => 3, "role" => "user", "message" => "I'm having trouble with my account."],
    ["id" => 4, "role" => "bot", "message" => "Sure, I'll assist you with that."],
    ["id" => 5, "role" => "bot", "message" => "Could you please provide your account details?"],
    ["id" => 6, "role" => "user", "message" => "Sure, my account ID is ABC123."],
    ["id" => 7, "role" => "bot", "message" => "Thank you. Let me check your account."],
    ["id" => 8, "role" => "bot", "message" => "I've found the issue. It should be resolved now."],
    ["id" => 9, "role" => "user", "message" => "Great! Thank you for your help."],
    ["id" => 10, "role" => "bot", "message" => "You're welcome! If you need further assistance, feel free to ask."],
];

// foreach ($messages as $message) {
//     array_push($api_response, [
//         "id" => $message->id,
//         "role" => $message->role,
//         "message" => $message->content[0]->text->value
//     ]);
// }
foreach ($messages as $message) {
    array_push($api_response, [
        "id" => $message['id'],
        "role" => $message['role'],
        "message" => $message['message']
    ]);
}
$api_response = json_encode($api_response);
echo $api_response;
