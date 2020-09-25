<?php
namespace App\Http\Controllers;
use App\Http\Requests\CustomerTableRequest;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Storage;
use Redirect,Response;

class CustomerController extends Controller
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * CustomerController constructor.
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $customers = Customer::latest()->paginate(4);
        return view('customers.index',compact('customers'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\CustomerTableRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(CustomerTableRequest $request)
    { /*
        $data = $request->all();


        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('customers');

            $data['image'] = $imagePath;
        }


        $customer = $this->customer->create($data);

        return redirect()->route('customers.index')->with('success','Cadastrado com sucesso');
       */
        $r=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $custId = $request->cust_id;
        Customer::updateOrCreate(['id' => $custId],['name' => $request->name, 'email' => $request->email,'address'=>$request->address,'image' =>$request->image, 'slug' =>$request->slug]);
        if(empty($request->cust_id))
            $msg = 'Customer entry created successfully.';
        else
            $msg = 'Customer data is updated successfully';
        return redirect()->route('customers.index')->with('success',$msg);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $where = array('id' => $id);
        $customer = Customer::where($where)->first();
        return Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(CustomerTableRequest $request, $id)
    {
        $data = $request->all();

        $customer = Customer::find($id);



        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('customers');
            $data['image'] = $imagePath;
        }

        $customer->update($data);

        return redirect()->route('customers.index')->with('success','Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $filename = $customer->image;
        $customer->delete();
        Storage::delete($filename);
        return redirect()->route('customers.index');
        /*
        $cust = Customer::where('id',$id)->delete();
        return Response::json($cust);
        */
    }
}
