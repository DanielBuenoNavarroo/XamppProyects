<?php
if ($sessionUser) header("Location: $baseRoute");

$vista = $_GET['view'] ?? 'login';

$logo_style = "w-fit text-6xl p-3 font-semibold [text-shadow:_0_4px_8px_rgba(14_165_223_/_0.5)] bg-gradient-to-t from-blue-400 to-green-400 hover:from-blue-500 hover:to-green-500 inline-block text-transparent bg-clip-text";
$form_style = 'flex flex-col gap-1 w-96';
$label_style = 'text-sm ml-2';
$input_style = 'rounded-md px-4 py-3 w-full border border-gray-700 bg-gray-900 mb-4';
$submit_style = 'w-full text-white bg-gradient-to-r from-slate-500 via-slate-600 to-slate-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-slate-300 dark:focus:ring-slate-800 shadow-lg shadow-slate-500/50 dark:shadow-lg dark:shadow-slate-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2';

require "./client/views/auth.view.php";