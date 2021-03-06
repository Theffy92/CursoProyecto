<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Encoder_Rfc2231Encoder implements Swift_Encoder
{
 private $charStream;
 public function __construct(Swift_CharacterStream $charStream)
 {
 $this->charStream = $charStream;
 }
 public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
 {
 $lines = [];
 $lineCount = 0;
 $lines[] = '';
 $currentLine =& $lines[$lineCount++];
 if (0 >= $maxLineLength) {
 $maxLineLength = 75;
 }
 $this->charStream->flushContents();
 $this->charStream->importString($string);
 $thisLineLength = $maxLineLength - $firstLineOffset;
 while (\false !== ($char = $this->charStream->read(4))) {
 $encodedChar = \rawurlencode($char);
 if (0 != \strlen($currentLine) && \strlen($currentLine . $encodedChar) > $thisLineLength) {
 $lines[] = '';
 $currentLine =& $lines[$lineCount++];
 $thisLineLength = $maxLineLength;
 }
 $currentLine .= $encodedChar;
 }
 return \implode("\r\n", $lines);
 }
 public function charsetChanged($charset)
 {
 $this->charStream->setCharacterSet($charset);
 }
 public function __clone()
 {
 $this->charStream = clone $this->charStream;
 }
}
