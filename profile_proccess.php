<?php
require 'config.php';
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
   header('Location: login.php');
   exit();
}
$user_id = $_SESSION['user_id'];
// Fetch user information
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $connexion->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch();
// Fetch user tweets
$query = "SELECT * FROM tweets WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $connexion->prepare($query);
$stmt->execute([$user_id]);
$tweets = $stmt->fetchAll();
?>
