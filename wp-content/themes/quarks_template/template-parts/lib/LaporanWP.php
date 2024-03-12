<?php
class LaporanWP
{
    public static function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function renderTabel($category, $activeMenu): string
    {

        $dirPath    = ABSPATH . 'wp-content/emiten/' . $category . '/' . $activeMenu;
        $files = scandir($dirPath);

        $year = array();
        $docs = array('FR03', 'FR06', 'FR09', 'FR12', 'AR12');

        foreach ($files as $file) {
            $filePath = $dirPath . '/' . $file;
            if (is_file($filePath)) {
                array_push($year, substr($file, 0, 4));
            }
        }

        $year = array_unique($year);
        rsort($year);
        $html = '';
        foreach ($year as $y) {
            $html .= '<tr class="table-data-row odd">';
            $html .= '<td class="table-data-value">' . $y . '</td>';

            foreach ($docs as $d) {
                if (in_array("$y$d.pdf", $files))
                    $html .= '<td class="table-data-value"><a href="' . site_url() . '/view/?data=' . EncryptionWP::encrypt(LaporanWP::getName(5) . '_' . $category . '_' . $activeMenu . '_' . $y . $d . '.pdf') . '" target="_blank"> link </a></td>';
                else
                    $html .= '<td class="table-data-value"></td>';
            }
            $html .= '</tr>';
        }

        return $html;
    }

    public static function renderTabelHeader(): string
    {
        $html = '';
        $html .= '<tr class="table-data-row">';
        $html .= '<th class="">Tahun</th>';
        $html .= '<th class="">FRQ1</th>';
        $html .= '<th class="">FRQ2</th>';
        $html .= '<th class="">FRQ3</th>';
        $html .= '<th class="">FRQ4</th>';
        $html .= '<th class="">Annual Report</th>';
        $html .= '</tr>';
        return $html;
    }
}
