<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PaymentMethod;
use App\Repositories\PaymentMethodRepository;
use Illuminate\Http\Request;
use Flash;

class PaymentMethodController extends AppBaseController
{
    /** @var PaymentMethodRepository $paymentMethodRepository*/
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepo)
    {
        $this->paymentMethodRepository = $paymentMethodRepo;
        
        $this->middleware(['admin_permissions:add-payment-methods'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-payment-methods'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-payment-methods'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-payment-methods'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the PaymentMethod.
     */
    public function index(Request $request)
    {
        $query = PaymentMethod::query();
        if (!empty($request->search)) {
            $query->where('payment_method_name', 'LIKE', '%' . $request->search . "%");
        }
        $paymentMethods = $query->orderBy('position', 'asc')->paginate(10);

        return view('payment_methods.index')
            ->with('paymentMethods', $paymentMethods);
    }

    /**
     * Show the form for creating a new PaymentMethod.
     */
    public function create()
    {
        return view('payment_methods.create');
    }

    /**
     * Store a newly created PaymentMethod in storage.
     */
    public function store(CreatePaymentMethodRequest $request)
    {
        $input = $request->all();

        $paymentMethod = $this->paymentMethodRepository->create($input);

        Flash::success('Payment Method saved successfully.');

        return redirect(route('paymentMethods.index'));
    }

    /**
     * Display the specified PaymentMethod.
     */
    public function show($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('paymentMethods.index'));
        }

        return view('payment_methods.show')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Show the form for editing the specified PaymentMethod.
     */
    public function edit($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('paymentMethods.index'));
        }

        return view('payment_methods.edit')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Update the specified PaymentMethod in storage.
     */
    public function update($id, UpdatePaymentMethodRequest $request)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('paymentMethods.index'));
        }

        $paymentMethod = $this->paymentMethodRepository->update($request->all(), $id);

        Flash::success('Payment Method updated successfully.');

        return redirect(route('paymentMethods.index'));
    }

    /**
     * Remove the specified PaymentMethod from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('paymentMethods.index'));
        }

        if($paymentMethod->transactions->count() > 0){
            Flash::error('Unable to delete this Payment Method. Please delete assigned Transactions first.');
        }else{
            $this->paymentMethodRepository->delete($id);
            Flash::success('Payment Method deleted successfully.');
        }

        return redirect(route('paymentMethods.index'));
    }

    public function sort(Request $request)
    {
        $paymentMethods = $this->paymentMethodRepository->all();

        foreach ($paymentMethods as $paymentMethod) {
            foreach ($request->order as $order) {
                if ($order['id'] == $paymentMethod->id) {
                    $paymentMethod->position = $order['position'];
                    $paymentMethod->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
