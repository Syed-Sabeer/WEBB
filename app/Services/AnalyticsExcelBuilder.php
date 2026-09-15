<?php

namespace App\Services;

use Illuminate\Support\Collection;

class AnalyticsExcelBuilder
{
    private const HEADERS = [
        'Record Type', 'Record ID', 'Date', 'Time', 'IP Address', 'Country',
        'State', 'City', 'Postal Code', 'Area', 'Name', 'Email', 'Phone',
        'Subject', 'Message',
    ];

    public function build(Collection $visitors, Collection $contacts): string
    {
        $rows = [];

        foreach ($visitors as $visitor) {
            $rows[] = [
                'Visit', $visitor->id, (string) $visitor->visit_date,
                optional($visitor->created_at)->format('H:i:s'), $visitor->ip_address,
                $visitor->country, $visitor->state, $visitor->city, $visitor->postal_code,
                $visitor->area, '', '', '', '', '',
            ];
        }

        foreach ($contacts as $contact) {
            $rows[] = [
                'Contact Submission', $contact->id, optional($contact->created_at)->format('Y-m-d'),
                optional($contact->created_at)->format('H:i:s'), $contact->ip_address,
                $contact->country, $contact->state, $contact->city, $contact->postal_code,
                $contact->area, $contact->fullname, $contact->email, $contact->phone,
                $contact->subject, $contact->message,
            ];
        }

        $sheetRows = $this->sheetRow(self::HEADERS, 1, true);
        foreach ($rows as $index => $row) {
            $sheetRows .= $this->sheetRow($row, $index + 2);
        }

        $lastRow = count($rows) + 1;
        $sheet = $this->sheetXml($sheetRows, $lastRow);

        return $this->zip([
            '[Content_Types].xml' => $this->contentTypesXml(),
            '_rels/.rels' => $this->rootRelationshipsXml(),
            'xl/workbook.xml' => $this->workbookXml(),
            'xl/_rels/workbook.xml.rels' => $this->workbookRelationshipsXml(),
            'xl/styles.xml' => $this->stylesXml(),
            'xl/worksheets/sheet1.xml' => $sheet,
        ]);
    }

    private function sheetRow(array $values, int $rowNumber, bool $header = false): string
    {
        $cells = '';
        foreach ($values as $index => $value) {
            $reference = $this->columnName($index + 1).$rowNumber;
            $value = (string) ($value ?? '');

            if (! $header && $index === 1 && ctype_digit($value)) {
                $cells .= '<c r="'.$reference.'"><v>'.$value.'</v></c>';
            } elseif (! $header && $index === 2 && preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
                $serial = (int) floor((strtotime($value.' UTC') - strtotime('1899-12-30 UTC')) / 86400);
                $cells .= '<c r="'.$reference.'" s="1"><v>'.$serial.'</v></c>';
            } else {
                $style = $header ? ' s="2"' : '';
                $cells .= '<c r="'.$reference.'" t="inlineStr"'.$style.'><is><t xml:space="preserve">'.$this->escape($value).'</t></is></c>';
            }
        }

        return '<row r="'.$rowNumber.'">'.$cells.'</row>';
    }

    private function sheetXml(string $rows, int $lastRow): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            .'<sheetViews><sheetView workbookViewId="0"><pane ySplit="1" topLeftCell="A2" activePane="bottomLeft" state="frozen"/></sheetView></sheetViews>'
            .'<cols><col min="1" max="15" width="18" customWidth="1"/><col min="15" max="15" width="45" customWidth="1"/></cols>'
            .'<sheetData>'.$rows.'</sheetData>'
            .'<autoFilter ref="A1:O'.$lastRow.'"/>'
            .'</worksheet>';
    }

    private function contentTypesXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
            .'<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
            .'<Default Extension="xml" ContentType="application/xml"/>'
            .'<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
            .'<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            .'<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>'
            .'</Types>';
    }

    private function rootRelationshipsXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            .'<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
            .'</Relationships>';
    }

    private function workbookXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
            .'<sheets><sheet name="Analytics" sheetId="1" r:id="rId1"/></sheets></workbook>';
    }

    private function workbookRelationshipsXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            .'<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
            .'<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>'
            .'</Relationships>';
    }

    private function stylesXml(): string
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            .'<fonts count="2"><font><sz val="10"/><name val="Arial"/></font><font><b/><color rgb="FFFFFFFF"/><sz val="10"/><name val="Arial"/></font></fonts>'
            .'<fills count="3"><fill><patternFill patternType="none"/></fill><fill><patternFill patternType="gray125"/></fill><fill><patternFill patternType="solid"><fgColor rgb="FF198754"/><bgColor indexed="64"/></patternFill></fill></fills>'
            .'<borders count="1"><border><left/><right/><top/><bottom/><diagonal/></border></borders>'
            .'<cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs>'
            .'<cellXfs count="3"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/><xf numFmtId="14" fontId="0" fillId="0" borderId="0" xfId="0" applyNumberFormat="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" xfId="0" applyFont="1" applyFill="1"/></cellXfs>'
            .'</styleSheet>';
    }

    private function zip(array $files): string
    {
        $data = '';
        $directory = '';
        $offset = 0;
        $count = 0;

        foreach ($files as $name => $contents) {
            $compressed = gzdeflate($contents, 6);
            $crc = crc32($contents);
            $nameLength = strlen($name);
            $data .= pack('VvvvvvVVVvv', 0x04034b50, 20, 0, 8, 0, 0, $crc, strlen($compressed), strlen($contents), $nameLength, 0).$name.$compressed;
            $directory .= pack('VvvvvvvVVVvvvvvVV', 0x02014b50, 20, 20, 0, 8, 0, 0, $crc, strlen($compressed), strlen($contents), $nameLength, 0, 0, 0, 0, 0, $offset).$name;
            $offset = strlen($data);
            $count++;
        }

        return $data.$directory.pack('VvvvvVVv', 0x06054b50, 0, 0, $count, $count, strlen($directory), strlen($data), 0);
    }

    private function columnName(int $number): string
    {
        $name = '';
        while ($number > 0) {
            $number--;
            $name = chr(65 + ($number % 26)).$name;
            $number = intdiv($number, 26);
        }
        return $name;
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
