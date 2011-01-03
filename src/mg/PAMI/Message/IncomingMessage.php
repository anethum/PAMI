<?php
/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace PAMI\Message;

/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
abstract class IncomingMessage extends Message
{
    /**
     * Returns key: 'ActionID'.
     *
     * @return string
     */
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    /**
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     * 
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct();
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $this->setKey(
                trim($content[0]), isset($content[1]) ? trim($content[1]) : ''
            );
        }
    } 
}
