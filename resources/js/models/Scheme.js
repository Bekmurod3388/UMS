const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('./index');

class Scheme extends Model {

}

Scheme.init({
    controller_id: DataTypes.BIGINT,
    sensor_id: DataTypes.BIGINT
}, {
    sequelize,
    createdAt: 'created_at',
    updatedAt: 'updated_at'
});
