<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model;

use Pioniro\OrangeData\Model\Order\Content;

class Order
{
    /**
     * @name(Идентификатор документа)
     * @var string
     * @required
     */
    protected $id;

    /**
     * @name(ИНН организации, для которой пробивается чек)
     * @var string
     * @required
     */
    protected $inn;

    /**
     * @var Content
     * @required
     */
    protected $content;

    /**
     * @var string
     * @required
     * @maxLen(32)
     */
    protected $key;

    /**
     * @var string|null
     * @maxLen(1024)
     */
    protected $callbackUrl;

    /**
     * @name(Группа устройств, с помощью которых будет пробит чек)
     * @var string|null
     */
    protected $group;

    /**
     * Order constructor.
     * @param string $id
     * @param string $inn
     * @param Content $content
     * @param string $key
     */
    public function __construct(string $id, string $inn, Content $content, string $key)
    {
        $this->id = $id;
        $this->inn = $inn;
        $this->content = $content;
        $this->key = $key;
    }

    /**
     * @param string|null $callbackUrl
     */
    public function setCallbackUrl(?string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group): void
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
}