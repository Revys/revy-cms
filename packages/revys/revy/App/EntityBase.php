<?php

namespace Revys\Revy\App;

use Illuminate\Database\Eloquent\Model;

class EntityBase extends Model
{
    const STATUS_HIDDEN = 0;
    const STATUS_PUBLISHED = 1;
    
    protected $guarded = ['id'];

    /**
     * Находит объект по уникальному полю urlid
     */
    public static function findByUrlid($urlid)
	{
		return static::where('urlid', '=', $urlid)->firstOrFail();
	}

    /**
     * Находит объект по уникальному полю name_id
     */
    public static function findByName($name_id)
	{
		return static::where('name_id', '=', $name_id)->firstOrFail();
	}

	/**
	 * Нормализует мета-данные для отображения на странице
     *
     * @todo Получать значения переменных [default_meta_title], [default_meta_description] и [default_meta_keywords] из базы данных
	 */
	public function assignMeta()
	{
        $default_meta_title = '';
        $default_meta_description = '';
        $default_meta_keywords = '';

		$this->meta_title = ($this->meta_title) ? $this->meta_title : $default_meta_title;

		$meta_description = ($this->meta_description) ? $this->meta_description : $default_meta_description;
		$meta_keywords = ($this->meta_keywords) ? $this->meta_keywords : $default_meta_keywords;
		
		if ($meta_description !== '')
			$this->meta_description = $meta_description;

		if ($meta_keywords !== '')
			$this->meta_keywords = $meta_keywords;

        return $this;
	}
    
    /**
     * Отбирает только опубликованные объекты
     */
    public function scopePublished($query)
    {
        $query->where('status', '=', self::STATUS_PUBLISHED);
    }

    /**
     * Скрыт ли объект
     */
    public function isHidden()
    {
        return ($this->status == self::STATUS_HIDDEN);
    }

    /**
     * Опубликован ли объект
     */
    public function isPublished()
    {
        return ($this->status == self::STATUS_PUBLISHED);
    }

    /** 
     *  Возвращает массив с ключом и значением без выбранного элемента
     */
    public static function getListForRelation($object = null, $keyField = 'id', $titleField = 'title')
    {
        $id = isset($object) ? $object->id : 0;
        $items = static::where('id', '!=', $id)->get()->toArray();

        $items = \Revys\Revy\App\Helpers\Tree::sort($items);

        $newItems = $items;
        $items = array();

        foreach ($newItems as $item) {
            $items[$item[$keyField]] = str_repeat('-- ', $item['level']) . $item[$titleField];
        }

        return ['' => __('-- Без родителя')] + $items;
    }

    /**
     *  Публикет объект
     */
    public function publish()
    {
        $this->status = self::STATUS_PUBLISHED;

        return $this->save();
    }
    
    /**
     *  Публикет объект
     */
    public function hide()
    {
        $this->status = self::STATUS_HIDDEN;

        return $this->save();
    }
    
    /**
     * Validation default rules
     */
     public static function rules()
     {
         return [];
     }

    /**
     * Validation default messages
     */
    public static function messages()
    {
        return [
            'required' => __('Это обязательное поле')
        ];
    }
}
