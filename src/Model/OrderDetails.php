<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model;

use DateTime;

class OrderDetails
{
    /**
     * @var string
     * @name("Идентификатор документа")
     */
    protected $id;

    /**
     * @var string
     * @name("Заводской номер устройства пробившего чек")
     */
    protected $deviceSN;

    /**
     * @var string
     * @name("Регистрационный номер устройства пробившего чек")
     */
    protected $deviceRN;

    /**
     * @var string
     * @name("Номер фискального накопителя")
     */
    protected $fsNumber;

    /**
     * @var string
     * @name("Наименование ОФД")
     */
    protected $ofdName;

    /**
     * @var string
     * @name("Web-сайт ОФД")
     */
    protected $ofdWebsite;

    /**
     * @var string
     * @name("ИНН ОФД")
     */
    protected $ofdINN;

    /**
     * @var string
     * @name("Web-сайт ФНС")
     */
    protected $fnsWebsite;

    /**
     * @var string
     * @name("ИНН пользователя")
     */
    protected $companyINN;

    /**
     * @var string
     * @name("Наименование пользователя")
     */
    protected $companyName;

    /**
     * @var integer
     * @name("Номер ФД")
     */
    protected $documentNumber;

    /**
     * @var integer
     * @name("Номер смены")
     */
    protected $shiftNumber;

    /**
     * @var integer
     * @name("Номер чека за смену")
     */
    protected $documentIndex;

    /**
     * @var DateTime
     * @name("Время регистрации фискального документа в ФН")
     */
    protected $processedAt;

    /**
     * @var Order\Content
     * @name("Содержимое документа")
     */
    protected $content;

    /**
     * @var float
     * @name("Сдача")
     */
    protected $change;

    /**
     * @var string
     * @name("Фискальный признак")
     */
    protected $fp;

    /**
     * @var string|null
     * @name("URL для отправки результатов обработки чека POST запросом")
     */
    protected $callbackUrl;

    /**
     * OrderDetails constructor.
     * @param string $id
     * @param string $deviceSN
     * @param string $deviceRN
     * @param string $fsNumber
     * @param string $ofdName
     * @param string $ofdWebsite
     * @param string $ofdINN
     * @param string $fnsWebsite
     * @param string $companyINN
     * @param string $companyName
     * @param int $documentNumber
     * @param int $shiftNumber
     * @param int $documentIndex
     * @param DateTime $processedAt
     * @param Order\Content $content
     * @param float $change
     * @param string $fp
     * @param string|null $callbackUrl
     */
    public function __construct(
        string $id,
        string $deviceSN,
        string $deviceRN,
        string $fsNumber,
        string $ofdName,
        string $ofdWebsite,
        string $ofdINN,
        string $fnsWebsite,
        string $companyINN,
        string $companyName,
        int $documentNumber,
        int $shiftNumber,
        int $documentIndex,
        DateTime $processedAt,
        Order\Content $content,
        float $change,
        string $fp,
        ?string $callbackUrl
    )
    {
        $this->id = $id;
        $this->deviceSN = $deviceSN;
        $this->deviceRN = $deviceRN;
        $this->fsNumber = $fsNumber;
        $this->ofdName = $ofdName;
        $this->ofdWebsite = $ofdWebsite;
        $this->ofdINN = $ofdINN;
        $this->companyINN = $companyINN;
        $this->companyName = $companyName;
        $this->documentNumber = $documentNumber;
        $this->shiftNumber = $shiftNumber;
        $this->documentIndex = $documentIndex;
        $this->processedAt = $processedAt;
        $this->content = $content;
        $this->change = $change;
        $this->fp = $fp;
        $this->callbackUrl = $callbackUrl;
        $this->fnsWebsite = $fnsWebsite;
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
    public function getDeviceSN(): string
    {
        return $this->deviceSN;
    }

    /**
     * @return string
     */
    public function getDeviceRN(): string
    {
        return $this->deviceRN;
    }

    /**
     * @return string
     */
    public function getFsNumber(): string
    {
        return $this->fsNumber;
    }

    /**
     * @return string
     */
    public function getOfdName(): string
    {
        return $this->ofdName;
    }

    /**
     * @return string
     */
    public function getOfdWebsite(): string
    {
        return $this->ofdWebsite;
    }

    /**
     * @return string
     */
    public function getOfdINN(): string
    {
        return $this->ofdINN;
    }

    /**
     * @return string
     */
    public function getCompanyINN(): string
    {
        return $this->companyINN;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return int
     */
    public function getDocumentNumber(): int
    {
        return $this->documentNumber;
    }

    /**
     * @return int
     */
    public function getShiftNumber(): int
    {
        return $this->shiftNumber;
    }

    /**
     * @return int
     */
    public function getDocumentIndex(): int
    {
        return $this->documentIndex;
    }

    /**
     * @return DateTime
     */
    public function getProcessedAt(): DateTime
    {
        return $this->processedAt;
    }

    /**
     * @return Order\Content
     */
    public function getContent(): Order\Content
    {
        return $this->content;
    }

    /**
     * @return float
     */
    public function getChange(): float
    {
        return $this->change;
    }

    /**
     * @return string
     */
    public function getFp(): string
    {
        return $this->fp;
    }

    /**
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
}