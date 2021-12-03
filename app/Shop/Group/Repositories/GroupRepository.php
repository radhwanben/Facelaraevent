?php
namespace App\Shop\Groups\Repositories;
use App\Shop\Groups\Group;
use App\Shop\Groups\Exceptions\CreateGroupErrorException;
use Illuminate\Database\QueryException;
class GroupRepository
{
    /**
     * GroupRepository constructor.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->model = $group;
    }
    /**
     * @param array $data
     * @return Group
     * @throws CreateGroupErrorException
     */
    public function createGroup(array $data) : Group
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            throw new CreateGroupErrorException($e);
        }
    }
}
