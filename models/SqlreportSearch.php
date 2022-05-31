<?php

namespace d4yii2\sqlreport\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SqlreportSearch represents the model behind the search form about `d4yii2\sqlreport\models\Sqlreport`.
 */
class SqlreportSearch extends Sqlreport
{
    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['id', 'sys_company_id'], 'integer'],
            [['name', 'sql', 'notes'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sqlreport::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return new ActiveDataProvider([
                'query' => $query,
                //'sort' => ['defaultOrder' => ['????' => SORT_ASC]]            
            ]);
        }

        $query = self::find()
            ->select([
                'sqlreport.*'
            ])
            ->andFilterWhere([
                'sqlreport.id' => $this->id,
                'sqlreport.sys_company_id' => $this->sys_company_id,
            ])
            ->andFilterWhere(['like', 'sqlreport.name', $this->name])
            ->andFilterWhere(['like', 'sqlreport.sql', $this->sql])
            ->andFilterWhere(['like', 'sqlreport.notes', $this->notes]);
        return new ActiveDataProvider([
            'query' => $query,
            //'sort' => ['defaultOrder' => ['????' => SORT_ASC]]            
        ]);
    }
}