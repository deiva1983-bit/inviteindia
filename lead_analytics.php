<?php
/**
 * Lead Analytics Dashboard
 * View: /lead_analytics.php
 * Shows lead capture metrics and performance
 */

include_once('includes/configs/init.php');

// Check if admin (you can modify auth as needed)
$is_admin = isset($_SESSION['admin_user']) || isset($_GET['view']); // Simple check

if (!$is_admin) {
    header('Location: index.php');
    exit;
}

$userslog_obj = new userslog();

// Get overall stats
$totalLeadsSql = "SELECT COUNT(*) as count FROM email_leads";
$totalLeads = $userslog_obj->db_connect->getOneFromSQL($totalLeadsSql);

$todayLeadsSql = "SELECT COUNT(*) as count FROM email_leads WHERE DATE(created_at) = CURDATE()";
$todayLeads = $userslog_obj->db_connect->getOneFromSQL($todayLeadsSql);

$convertedSql = "SELECT COUNT(*) as count FROM email_leads WHERE status = 'converted'";
$convertedLeads = $userslog_obj->db_connect->getOneFromSQL($convertedSql);

$thisMonthSql = "SELECT COUNT(*) as count FROM email_leads WHERE MONTH(created_at) = MONTH(CURDATE())";
$thisMonthLeads = $userslog_obj->db_connect->getOneFromSQL($thisMonthSql);

// Get daily breakdown (last 7 days)
$dailySql = "SELECT DATE(created_at) as date, COUNT(*) as count
             FROM email_leads
             WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
             GROUP BY DATE(created_at)
             ORDER BY date DESC";
$dailyData = $userslog_obj->db_connect->querySelect($dailySql);
$userslog_obj->db_connect->closedb();

// Recent leads
$recentSql = "SELECT lead_id, couple_name, email, status, created_at
              FROM email_leads
              ORDER BY created_at DESC
              LIMIT 20";
$recentLeads = $userslog_obj->selectVal($recentSql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Analytics - InviteIndia</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #d81b60; margin-bottom: 30px; }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .stat-card h3 { color: #666; font-size: 14px; margin-bottom: 10px; }
        .stat-value { font-size: 32px; font-weight: bold; color: #d81b60; }
        .stat-subtext { color: #999; font-size: 12px; margin-top: 5px; }

        .chart-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 30px; }

        .table-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f0f0f0; padding: 12px; text-align: left; font-weight: 600; color: #333; border-bottom: 1px solid #ddd; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:hover { background: #f9f9f9; }

        .status-new { background: #e3f2fd; color: #1976d2; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .status-contacted { background: #fff3e0; color: #f57c00; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .status-converted { background: #e8f5e9; color: #388e3c; padding: 4px 8px; border-radius: 4px; font-size: 12px; }

        .conversion-rate { color: #388e3c; font-weight: bold; }
        .footer { text-align: center; color: #999; font-size: 12px; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Lead Capture Analytics</h1>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Leads</h3>
                <div class="stat-value"><?php echo $totalLeads['count'] ?? 0; ?></div>
                <div class="stat-subtext">All time</div>
            </div>

            <div class="stat-card">
                <h3>Today's Leads</h3>
                <div class="stat-value"><?php echo $todayLeads['count'] ?? 0; ?></div>
                <div class="stat-subtext"><?php echo date('F d, Y'); ?></div>
            </div>

            <div class="stat-card">
                <h3>This Month</h3>
                <div class="stat-value"><?php echo $thisMonthLeads['count'] ?? 0; ?></div>
                <div class="stat-subtext"><?php echo date('F Y'); ?></div>
            </div>

            <div class="stat-card">
                <h3>Converted</h3>
                <div class="stat-value"><?php echo $convertedLeads['count'] ?? 0; ?></div>
                <div class="stat-subtext conversion-rate">
                    <?php
                    $rate = $totalLeads['count'] > 0 ? round(($convertedLeads['count'] / $totalLeads['count']) * 100, 1) : 0;
                    echo $rate . '% conversion';
                    ?>
                </div>
            </div>
        </div>

        <!-- Daily Breakdown -->
        <div class="chart-container">
            <h2 style="margin-bottom: 20px; color: #333;">Last 7 Days</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Leads</th>
                    <th>Trend</th>
                </tr>
                <?php if ($dailyData): ?>
                    <?php foreach ($dailyData as $day): ?>
                    <tr>
                        <td><?php echo date('M d, Y', strtotime($day['date'])); ?></td>
                        <td><?php echo $day['count']; ?></td>
                        <td>
                            <?php
                            $bars = str_repeat('█', $day['count']);
                            echo '<span style="color: #d81b60;">' . $bars . '</span>';
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>

        <!-- Recent Leads Table -->
        <div class="table-container">
            <h2 style="margin-bottom: 20px; color: #333;">Recent Leads (Last 20)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Captured</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($recentLeads): ?>
                        <?php foreach ($recentLeads as $lead): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($lead['couple_name']); ?></td>
                            <td><?php echo htmlspecialchars($lead['email']); ?></td>
                            <td>
                                <span class="status-<?php echo $lead['status']; ?>">
                                    <?php echo ucfirst($lead['status']); ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y h:i A', strtotime($lead['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" style="text-align: center; color: #999;">No leads yet</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Lead Analytics Dashboard | Last updated: <?php echo date('M d, Y H:i:s'); ?></p>
            <p>Tip: Setup email follow-ups by running: <code>php email_follow_up_sequence.php</code> daily via cron</p>
        </div>
    </div>
</body>
</html>
